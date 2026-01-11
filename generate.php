<?php
function addPNGMetadata($imageData, $metadata) {
    $signature = "\x89PNG\r\n\x1a\n";
    
    if (substr($imageData, 0, 8) !== $signature) {
        return $imageData;
    }
    
    $chunks = array();
    $pos = 8;
    
    while ($pos < strlen($imageData)) {
        $length = unpack('N', substr($imageData, $pos, 4))[1];
        $chunkType = substr($imageData, $pos + 4, 4);
        $chunkData = substr($imageData, $pos + 8, $length);
        $crc = substr($imageData, $pos + 8 + $length, 4);
        
        $chunks[] = array(
            'type' => $chunkType,
            'data' => $chunkData,
            'crc' => $crc,
            'length' => $length
        );
        
        $pos += 12 + $length;
    }
    
    $textChunk = 'Description' . "\x00" . $metadata;
    $textChunkType = 'tEXt';
    $textLength = strlen($textChunk);
    $textCrc = crc32($textChunkType . $textChunk);
    
    $newChunks = array();
    foreach ($chunks as $chunk) {
        $newChunks[] = $chunk;
        if ($chunk['type'] === 'IHDR') {
            $newChunks[] = array(
                'type' => $textChunkType,
                'data' => $textChunk,
                'length' => $textLength,
                'crc' => pack('N', $textCrc & 0xFFFFFFFF)
            );
        }
    }
    
    $result = $signature;
    foreach ($newChunks as $chunk) {
        $result .= pack('N', $chunk['length']);
        $result .= $chunk['type'];
        $result .= $chunk['data'];
        if (isset($chunk['crc'])) {
            $result .= is_string($chunk['crc']) ? $chunk['crc'] : pack('N', $chunk['crc'] & 0xFFFFFFFF);
        }
    }
    
    return $result;
}

function getFlag() {
    $flagFile = __DIR__ . '/.flag';
    if (file_exists($flagFile)) {
        return trim(file_get_contents($flagFile));
    }
    return '';
}

$text = isset($_GET['text']) ? urldecode($_GET['text']) : 'brat';
$bg = isset($_GET['bg']) ? $_GET['bg'] : 'ffffff';
$align = isset($_GET['align']) ? $_GET['align'] : 'center';

$text = substr($text, 0, 50);
$bg = preg_replace('/[^0-9a-fA-F]/', '', $bg);
if (strlen($bg) !== 6) {
    $bg = '8ace00';
}

if (!in_array($align, ['left', 'center', 'right'])) {
    $align = 'center';
}

$text = trim($text);
if (empty($text)) {
    $text = 'brat';
}

$r = hexdec(substr($bg, 0, 2));
$g = hexdec(substr($bg, 2, 2));
$b = hexdec(substr($bg, 4, 2));

$brightness = (($r * 299) + ($g * 587) + ($b * 114)) / 1000;
$textColor = $brightness > 128 ? '000000' : 'ffffff';

if (extension_loaded('gd')) {
    $width = 240;
    $height = 240;
    $image = imagecreatetruecolor($width, $height);
    
    if ($image) {
        $bgColor = imagecolorallocate($image, $r, $g, $b);
        imagefill($image, 0, 0, $bgColor);
        
        $textColorR = hexdec(substr($textColor, 0, 2));
        $textColorG = hexdec(substr($textColor, 2, 2));
        $textColorB = hexdec(substr($textColor, 4, 2));
        $textColorAlloc = imagecolorallocate($image, $textColorR, $textColorG, $textColorB);
        
        $fontFile = null;
        if (file_exists(__DIR__ . '/assets/font.ttf')) {
            $fontFile = __DIR__ . '/assets/font.ttf';
        } else {
            $systemFonts = [
                'C:/Windows/Fonts/arialbd.ttf',
                'C:/Windows/Fonts/arial.ttf',
                '/usr/share/fonts/truetype/dejavu/DejaVuSans-Bold.ttf',
                '/usr/share/fonts/truetype/liberation/LiberationSans-Bold.ttf',
            ];
            
            foreach ($systemFonts as $font) {
                if (file_exists($font)) {
                    $fontFile = $font;
                    break;
                }
            }
        }
        
        if ($fontFile && function_exists('imagettftext')) {
            $lines = explode("\n", wordwrap($text, 6, "\n", false));
            $fontSize = 32;
            $lineHeight = $fontSize + 12;
            $totalHeight = count($lines) * $lineHeight;
            $startY = ($height - $totalHeight) / 2 + $fontSize;
            
            foreach ($lines as $index => $line) {
                $line = trim($line);
                if (empty($line)) continue;
                
                $bbox = @imagettfbbox($fontSize, 0, $fontFile, $line);
                if ($bbox === false) continue;
                
                $textWidth = abs($bbox[4] - $bbox[0]);
                
                switch ($align) {
                    case 'left':
                        $x = 15;
                        break;
                    case 'right':
                        $x = $width - $textWidth - 15;
                        break;
                    default:
                        $x = ($width - $textWidth) / 2;
                }
                
                $y = $startY + ($index * $lineHeight);
                @imagettftext($image, $fontSize, 0, (int)$x, (int)$y, $textColorAlloc, $fontFile, $line);
            }
        } else {
            $fontSize = 3;
            $textWidth = imagefontwidth($fontSize) * strlen($text);
            
            switch ($align) {
                case 'left':
                    $x = 10;
                    break;
                case 'right':
                    $x = $width - $textWidth - 10;
                    break;
                default:
                    $x = ($width - $textWidth) / 2;
            }
            
            $y = ($height - imagefontheight($fontSize)) / 2;
            imagestring($image, $fontSize, (int)$x, (int)$y, $text, $textColorAlloc);
        }
        
        header('Content-Type: image/png');
        header('Cache-Control: no-cache, no-store, must-revalidate');
        
        $filename = 'brat-' . time() . '.png';
        $flag = getFlag();
        
        ob_start();
        imagepng($image, null, 9);
        $imageData = ob_get_clean();
        
        if (!empty($flag)) {
            $imageData = addPNGMetadata($imageData, $flag);
        }
        
        header('Content-Disposition: inline; filename="' . $filename . '"');
        echo $imageData;
        imagedestroy($image);
        exit;
    }
}

$width = 240;
$height = 240;
$x_pos = $align === 'left' ? '15' : ($align === 'right' ? ($width - 15) : ($width / 2));
$text_anchor = $align === 'left' ? 'start' : ($align === 'right' ? 'end' : 'middle');

$lines = explode("\n", wordwrap($text, 6, "\n", false));
$lineCount = count($lines);
$fontSize = 32;
$lineHeight = 44;
$totalHeight = $lineCount * $lineHeight;
$startY = ($height - $totalHeight) / 2 + $fontSize;

$textElements = '';
foreach ($lines as $index => $line) {
    $line = trim($line);
    if (empty($line)) continue;
    
    $y = $startY + ($index * $lineHeight);
    $textElements .= '  <text x="' . $x_pos . '" y="' . $y . '" 
    font-size="' . $fontSize . '" font-weight="bold" fill="#' . $textColor . '" 
    text-anchor="' . $text_anchor . '" font-family="Arial, sans-serif"
    style="filter: url(#softBlur);">
    ' . htmlspecialchars($line) . '
  </text>' . "\n";
}

$svg = '<?xml version="1.0" encoding="UTF-8"?>
<svg width="' . $width . '" height="' . $height . '" xmlns="http://www.w3.org/2000/svg">
  <defs>
    <filter id="softBlur">
      <feGaussianBlur in="SourceGraphic" stdDeviation="0.7"/>
    </filter>
  </defs>
  <rect width="' . $width . '" height="' . $height . '" fill="#' . $bg . '"/>
' . $textElements . '
</svg>';

header('Content-Type: image/svg+xml');
header('Cache-Control: no-cache, no-store, must-revalidate');
echo $svg;
?>
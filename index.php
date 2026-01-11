<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Brat Generator</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <button id="themeToggle" class="theme-toggle" title="Toggle dark mode">🌙</button>
    <div class="container">
        <header>
            <h1>Brat Generator</h1>
            <p>Unleash Your Brat Vibe with Every Beat</p>
        </header>

        <div class="generator">
            <div class="controls">
                <div class="input-group">
                    <label for="text">Text:</label>
                    <input type="text" id="text" maxlength="50" value="brat" placeholder="Enter your text...">
                    <span class="char-count">0/50</span>
                </div>

                <div class="input-group">
                    <label>Background Color:</label>
                    <div class="color-options">
                        <div class="color-presets">
                            <button class="color-preset" data-color="#ffffff" style="background: #ffffff; border: 1px solid #ddd;" title="White"></button>
                            <button class="color-preset" data-color="#8ace00" style="background: #8ace00;" title="Brat Green"></button>
                            <button class="color-preset" data-color="#000000" style="background: #000000;" title="Black"></button>
                            <button class="color-preset" data-color="#0000ff" style="background: #0000ff;" title="Blue"></button>
                            <button class="color-preset" data-color="#ffff00" style="background: #ffff00;" title="Yellow"></button>
                            <button class="color-preset" data-color="#ff00ff" style="background: #ff00ff;" title="Magenta"></button>
                            <button class="color-preset" data-color="#00ffff" style="background: #00ffff;" title="Cyan"></button>
                            <button class="color-preset" data-color="#ffa500" style="background: #ffa500;" title="Orange"></button>
                            <button class="color-preset" data-color="#ff69b4" style="background: #ff69b4;" title="Pink"></button>
                        </div>
                    </div>
                </div>

                <div class="input-group">
                    <label>Text Align:</label>
                    <select id="textAlign">
                        <option value="center">Center</option>
                        <option value="left">Left</option>
                        <option value="right">Right</option>
                    </select>
                </div>
            </div>

            <div class="preview">
                <img id="previewImage" src="generate.php?text=woi+kocak&bg=ffffff&align=center" alt="Preview">
            </div>

            <div class="actions">
                <button id="downloadBtn" class="btn-download">Download PNG</button>
            </div>
        </div>

        <footer class="credit">
            <p>Made with ❤️ by <a href="https://ricoagista.me/" target="_blank" rel="noopener noreferrer">Rico Shandika J. A.</a></p>
            <p class="credit-subtitle">IT Enthusiast | Web Developer | Designer</p>
        </footer>
    </div>

    <script src="script.js"></script>
</body>
</html>
const textInput = document.getElementById('text');
const colorPresets = document.querySelectorAll('.color-preset');
const textAlign = document.getElementById('textAlign');
const previewImage = document.getElementById('previewImage');
const downloadBtn = document.getElementById('downloadBtn');
const charCount = document.querySelector('.char-count');
const themeToggle = document.getElementById('themeToggle');

let selectedColor = '#ffffff';

const initTheme = () => {
    const savedTheme = localStorage.getItem('theme');
    if (savedTheme === 'dark') {
        document.body.classList.add('dark-mode');
        themeToggle.textContent = '☀️';
    } else {
        document.body.classList.remove('dark-mode');
        themeToggle.textContent = '🌙';
    }
};

themeToggle.addEventListener('click', () => {
    document.body.classList.toggle('dark-mode');
    if (document.body.classList.contains('dark-mode')) {
        localStorage.setItem('theme', 'dark');
        themeToggle.textContent = '☀️';
    } else {
        localStorage.setItem('theme', 'light');
        themeToggle.textContent = '🌙';
    }
});

function updateCharCount() {
    const count = textInput.value.length;
    charCount.textContent = `${count}/50`;
}

function generateImageUrl() {
    const text = (textInput.value || 'brat').trim();
    const bg = selectedColor.replace('#', '');
    const align = textAlign.value;
    
    const timestamp = new Date().getTime();
    return `generate.php?text=${encodeURIComponent(text)}&bg=${bg}&align=${align}&t=${timestamp}`;
}

function updatePreview() {
    const newUrl = generateImageUrl();
    
    previewImage.style.opacity = '0.5';
    
    const tempImg = new Image();
    tempImg.onload = function() {
        previewImage.src = newUrl;
        previewImage.style.opacity = '1';
        previewImage.style.display = 'block';
    };
    tempImg.onerror = function() {
        previewImage.style.opacity = '1';
        previewImage.src = '';
        console.log('Failed to load image from: ' + newUrl);
    };
    tempImg.src = newUrl;
}

function updateActivePreset() {
    colorPresets.forEach(preset => {
        const presetColor = preset.dataset.color.toLowerCase();
        if (presetColor === selectedColor.toLowerCase()) {
            preset.classList.add('active');
        } else {
            preset.classList.remove('active');
        }
    });
}

textInput.addEventListener('input', () => {
    updateCharCount();
    updatePreview();
});

textAlign.addEventListener('change', updatePreview);

colorPresets.forEach(preset => {
    preset.addEventListener('click', () => {
        selectedColor = preset.dataset.color;
        updateActivePreset();
        updatePreview();
    });
});

downloadBtn.addEventListener('click', () => {
    const text = encodeURIComponent(textInput.value || 'brat');
    const bg = selectedColor.replace('#', '');
    const align = textAlign.value;
    
    const downloadUrl = `generate.php?text=${text}&bg=${bg}&align=${align}`;
    const link = document.createElement('a');
    link.href = downloadUrl;
    link.download = `brat-${Date.now()}.png`;
    document.body.appendChild(link);
    link.click();
    document.body.removeChild(link);
});

updateCharCount();
updateActivePreset();
updatePreview();
initTheme();
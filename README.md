# Brat Generator

Unleash your brat vibe with every beat! Generate stylish and customizable text images with vibrant colors and trendy aesthetics.

## 🎨 Features

- **Easy Text Input**: Enter text up to 50 characters and see a real-time preview
- **Color Customization**: Choose from 9 pre-designed color presets including:
  - Brat Green (#8ace00)
  - Classic White, Black, and various vibrant colors
  - Blue, Yellow, Magenta, Cyan, Orange, and Pink options
- **Text Alignment**: Align your text to the left, center, or right
- **Dark Mode Support**: Toggle between light and dark themes with local storage persistence
- **PNG Metadata**: Images include metadata for better organization
- **One-Click Download**: Download your generated images directly to your device
- **Responsive Design**: Works seamlessly on desktop and mobile devices

## 🚀 Getting Started

### Prerequisites
- PHP 7.0 or higher
- A web server (Apache, Nginx, etc.)
- Modern web browser with JavaScript enabled

### Installation

1. Clone the repository:
```bash
git clone https://github.com/yourusername/Brat-Generator.git
cd Brat-Generator
```

2. Place the project files on your web server:
```
/var/www/html/Brat-Generator/  # or your web root
```

3. Ensure the web server has write permissions for temporary files.

4. Access the application:
```
http://localhost/Brat-Generator/
```

## 📁 Project Structure

```
Brat-Generator/
├── index.php           # Main HTML interface
├── generate.php        # Backend image generation
├── script.js           # Frontend interactivity and logic
├── style.css           # Styling and theming
└── assets/
    └── font.ttf        # Custom font for text rendering
```

## 💻 Usage

1. **Enter Text**: Type your desired text in the input field (max 50 characters)
2. **Choose Colors**: Click on a color preset or select your custom color
3. **Set Alignment**: Use the dropdown to choose left, center, or right alignment
4. **Preview**: See a real-time preview of your image
5. **Download**: Click the download button to save your generated image as PNG

### Keyboard Shortcuts & Tips
- The default text is "brat" if you leave the input empty
- Character count updates in real-time
- Theme preference is saved in your browser's local storage
- All generated images are PNG format with metadata support

## 🛠️ Technical Details

### Frontend (JavaScript)
- Event listeners for real-time updates
- Dynamic image URL generation with parameters
- Local storage for theme persistence
- Canvas preview with fade effects

### Backend (PHP)
- Dynamic image generation using GD library
- PNG metadata insertion for image descriptions
- Support for custom text positioning and alignment
- Font rendering with TTF support

## 🎯 How It Works

1. User inputs text, selects colors, and chooses alignment
2. JavaScript generates a URL with encoded parameters
3. The request is sent to `generate.php`
4. PHP generates a PNG image with:
   - Custom background color
   - Rendered text with selected font
   - Proper text alignment
   - PNG metadata for organization
5. Image is returned to the browser for display/download

## 🌙 Theme Support

The application includes a built-in light/dark mode toggle:
- Click the theme button (🌙 for light mode, ☀️ for dark mode)
- Your preference is saved automatically in browser local storage
- Persists across sessions

## 📝 License

[Add your license here - e.g., MIT, Apache 2.0, etc.]

## 👤 Author

[Your Name/Username]

## 🤝 Contributing

Contributions are welcome! Feel free to:
1. Fork the repository
2. Create a feature branch (`git checkout -b feature/AmazingFeature`)
3. Commit your changes (`git commit -m 'Add some AmazingFeature'`)
4. Push to the branch (`git push origin feature/AmazingFeature`)
5. Open a Pull Request

## 📞 Support

If you encounter any issues or have questions, please open an issue on the GitHub repository.

## 🚀 Future Enhancements

- Additional font options
- Custom color picker (beyond presets)
- Batch image generation
- Social media integration for easy sharing
- Animated text effects
- Additional metadata options

---

**Enjoy creating your brat vibe! 🎨✨**

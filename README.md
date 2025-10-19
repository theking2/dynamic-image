# dynamic-image
Create dynamic placeholder images for designs

A PHP-based placeholder image generator that creates images on-the-fly with customizable dimensions and background colors.

## Usage

Simply access the `index.php` file with optional parameters:

### Default (100x100, light green background):
```
http://your-domain.com/
```

### Custom size:
```
http://your-domain.com/?size=300x200
```

### Custom background color (RGB values):
```
http://your-domain.com/?color=255,200,100
```

### Combined custom size and color:
```
http://your-domain.com/?size=400x300&color=0,255,0
```

## Parameters

- `size`: Image dimensions in format `WIDTHxHEIGHT` (default: 100x100, max: 2000x2000)
- `color`: RGB background color in format `R,G,B` (default: 239,255,239)

## Features

- Generates PNG images dynamically
- Displays image dimensions and color values as text overlay
- Red border around the image
- Input validation with sensible defaults
- Size limits to prevent resource abuse (max 2000x2000)

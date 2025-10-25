# dynamic-image
Create dynamic images for designs using PHP and GD library.

## Description
This is a PHP script that generates dynamic PNG images based on URL parameters. It's useful for creating placeholder images, testing responsive designs, or generating simple colored backgrounds.

## Features
- Dynamic image size (width x height)
- Custom background colors (RGB values)
- Red rectangle border
- Color information displayed as text
- Input validation and reasonable limits

## Usage

### Basic Usage
```
http://your-server/index.php
```
This generates a 100x100 pixel image with a light green background (239,255,239).

### Parameters

#### Size Parameter
```
http://your-server/index.php?size=WIDTHxHEIGHT
```
- Format: `WIDTHxHEIGHT` (e.g., `300x200`)
- Default: `100x100`
- Limits: 1-2000 pixels for both width and height
- Invalid formats fall back to default

Examples:
- `?size=200x150` - 200px wide, 150px tall
- `?size=500x500` - 500px square
- `?size=1920x1080` - Full HD dimensions

#### Color Parameter
```
http://your-server/index.php?color=R,G,B
```
- Format: `R,G,B` where R, G, B are values from 0-255
- Default: `239,255,239` (light green)
- Values are clamped to 0-255 range
- Invalid formats fall back to default

Examples:
- `?color=255,0,0` - Red background
- `?color=0,128,255` - Blue background
- `?color=255,255,255` - White background

#### Combined Parameters
```
http://your-server/index.php?size=400x300&color=128,128,128
```

## Requirements
- PHP 7.4+ (tested with PHP 8.3)
- GD extension enabled

## Installation
1. Ensure PHP and GD extension are installed
2. Place `index.php` in your web server directory
3. Access via web browser or HTTP requests

## Local Development
Start a local development server:
```bash
php -S localhost:8000
```

Then access:
- http://localhost:8000/index.php
- http://localhost:8000/index.php?size=300x200
- http://localhost:8000/index.php?color=255,128,0

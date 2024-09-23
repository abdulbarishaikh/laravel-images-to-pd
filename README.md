# Add Images Into PDF with Laravel

This is a Laravel project that allows you to generate PDFs with images, providing a preview and upload functionality using Dropzone. The images are uploaded to the server in a folder corresponding to the user's IP address.

## Features

- Image upload with Dropzone.js
- Images are uploaded into folders based on user IP addresses
- PDF generation with embedded images using `dompdf`
- Client-side preview of uploaded images
- PDF download triggered after content generation

## Requirements

- PHP 8.1 or higher
- Laravel 10.10 or higher
- [DOMPDF](https://github.com/dompdf/dompdf) for generating PDFs
- [Dropzone.js](https://www.dropzonejs.com/) for image upload and preview
- [GuzzleHTTP](https://github.com/guzzle/guzzle) for HTTP requests

## Installation

### 1. Clone the Repository

```bash
git clone <repository-url>
cd <project-directory>

2. Install Dependencies
Install the required PHP packages via Composer:
composer install


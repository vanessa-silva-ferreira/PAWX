#!/bin/bash

echo "🚀 Starting build process..."

# Ensure we're in the project root
pwd

# Display PHP version
php -v

# Display Composer version
composer -V

# Remove composer.lock and vendor directory
echo "🧹 Cleaning up existing dependencies..."
rm -f composer.lock
rm -rf vendor

# Install dependencies fresh
echo "📦 Installing dependencies..."
composer install --no-dev --prefer-dist --optimize-autoloader --ignore-platform-reqs

# Specifically install the problematic packages
echo "📦 Installing specific packages..."
composer require laravel/socialite maatwebsite/excel --update-with-dependencies

# Generate autoload files
echo "🔄 Generating autoload files..."
composer dump-autoload -o

# Environment setup
echo "⚙️ Setting up environment..."
cp .env.sample .env
php artisan key:generate --force

# Clear and cache configuration
echo "🧹 Clearing cache..."
php artisan config:clear
php artisan cache:clear
php artisan route:clear
php artisan view:clear

# Optimize
echo "✨ Optimizing application..."
php artisan optimize

echo "✅ Build process completed!"

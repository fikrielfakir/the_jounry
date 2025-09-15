# Laravel Event Management Application

## Overview
This is a Laravel web application with a Vue.js/Vite frontend for event management. The application includes user authentication, event management, clubs, partners, testimonials, and pages functionality.

## Recent Changes (September 15, 2025)
- Successfully imported from GitHub and configured for Replit environment
- Installed PHP 8.4 and Composer dependencies
- **UPDATED**: Fixed Vite configuration for Replit environment with proper HMR WebSocket settings
- **UPDATED**: Enhanced deployment configuration with production-ready build scripts
- Configured Vite for Replit hosting (Laravel on port 5000, Vite HMR on port 5173)
- Set up SQLite database with all migrations including Laravel Telescope
- Configured deployment for autoscale with proper Laravel optimization commands

## Project Architecture
- **Backend**: Laravel 12.28.1 with PHP 8.4
- **Frontend**: Vite with Laravel Breeze authentication scaffolding
- **Database**: SQLite (development), migrations include:
  - Users with profile fields
  - Clubs and Events with registrations
  - Partners and Testimonials
  - Pages for content management
  - Queue jobs table
  - Laravel Telescope monitoring
- **Key Dependencies**:
  - Laravel Breeze for authentication
  - Filament Admin Panel (v4.0)
  - Spatie Laravel Permission for role management
  - Stripe integration for payments
  - Laravel Telescope for debugging

## Development Setup
- **Workflow**: Runs Laravel server (port 5000) + Queue worker + Logs + Vite dev server
- **Frontend**: Served through Laravel on port 5000
- **Vite HMR**: Available on port 5173 for hot reload during development
- **Database**: SQLite file in `database/database.sqlite`

## Deployment Configuration
- **Target**: Autoscale deployment
- **Build Scripts**:
  - `npm run build` - Standard Vite build
  - `npm run build:production` - Production-optimized Vite build
  - `npm run deploy` - Complete deployment script (build + Laravel optimization)
- **Production**: Optimized Laravel with cached config, routes, and views
- **Port**: 5000 (required for Replit frontend access)
- **HMR Configuration**: Properly configured for Replit WebSocket on port 443

## Key Features
- User authentication and registration (Laravel Breeze)
- Event management system
- Club management
- Partner listings
- User testimonials
- Content pages system
- Payment processing (Stripe integration)
- Admin panel (Filament)
- Background job processing
- Application monitoring (Telescope)

## User Preferences
- Standard Laravel conventions
- Vite for frontend asset compilation
- SQLite for development simplicity
- Concurrently for running multiple development processes
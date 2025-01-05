# GUARDIAN RSS Feed Application

This project is a server-side PHP application that exposes RSS feeds for different categories (sections) of **The Guardian** newspaper. Users can request feeds using URLs in the format `/[section-name]`, such as `/movies`, `/politics`, or `/lifeandstyle`. The application fetches articles from The Guardian's API, caches them for 10 minutes, and serves them as RSS feeds.

## Features

- Fetch articles by section from **The Guardian API**.
- Cache responses for 10 minutes to improve performance and reduce API calls.
- Generate RSS feeds dynamically from API data.
- Easy extensibility and systematic structure.

## Requirements

- PHP >= 7.4
- Composer (Dependency Manager for PHP)

## Installation

1. **Clone the Repository**:
   ```bash
   git clone https://github.com/ajahi/guardian-rss-api
   cd guardian-rss-api
   ```

2. **Install Dependencies**:
   Run the following command to install required packages:
   ```bash
   composer install
   ```

3. **Environment Configuration**:
   Copy the `.env` file and set your configuration:
   ```bash
   cp .env.example .env
   ```
   Update the `.env` file with your Guardian API key:
   ```env
   GUARDIAN_API_KEY=your-api-key
   CACHE_TTL=600
   ```

4. **Start the Application**:
   Use PHP's built-in server to run the application:
   ```bash
   php -S localhost:8000 -t public
   ```

5. **Access the Application**:
   Open your browser and navigate to:
   ```
   http://localhost:8000/[section-name]
   ```
   Replace `[section-name]` with a valid section, such as `movies`, `politics`, or `lifeandstyle`.

## Directory Structure

```
.
├── app
│   ├── Controllers
│   │   └── SectionController.php
│   ├── Services
│   │   ├── CacheService.php
│   │   └── GuardianApiService.php
├── public
│   └── index.php
├── routes
├── vendor
├── .env
├── composer.json
├── composer.lock
└── README.md
```

- **app**: Contains core application logic, divided into `Controllers` and `Services`.
- **public**: The entry point for the application.
- **routes**: Reserved for defining application routes (if needed in the future).
- **vendor**: Composer-managed dependencies.

## API Endpoints

### GET `/{section-name}`
- **Description**: Fetches RSS feeds for a specific section.
- **Parameters**:
  - `section-name`: The name of the section (e.g., `movies`, `politics`).
- **Response**: RSS XML content.

## Caching

The application uses a caching system to store API responses for 10 minutes (configurable via `CACHE_TTL` in `.env`). The cache reduces API calls and improves response times. If a cached resource is valid, it is returned directly; otherwise, a fresh API request is made.

## Deployment

### Docker Deployment
*This section is reserved for future Docker deployment instructions.*

## Contributing

1. Fork the repository.
2. Create a new branch:
   ```bash
   git checkout -b feature/your-feature-name
   ```
3. Commit your changes:
   ```bash
   git commit -m 'Add some feature'
   ```
4. Push to the branch:
   ```bash
   git push origin feature/your-feature-name
   ```
5. Open a pull request.

## License

This project is licensed under the MIT License.


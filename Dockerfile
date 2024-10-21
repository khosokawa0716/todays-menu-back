# PHP-FPMベースのイメージを使用
FROM php:8.2-fpm

# 必要なPHP拡張をインストール
RUN apt-get update && apt-get install -y \
    libpng-dev \
    libjpeg62-turbo-dev \
    libfreetype6-dev \
    libonig-dev \
    libxml2-dev \
    zip \
    curl \
    unzip \
    git \
    && docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install pdo_mysql mbstring exif pcntl bcmath gd

# Composerをインストール
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# 作業ディレクトリを指定
WORKDIR /var/www

# Laravelのファイルをコンテナにコピー
COPY . /var/www

# Laravelプロジェクトのディレクトリの権限を修正
RUN chown -R www-data:www-data /var/www

# コンテナが起動時に実行するコマンド
CMD ["php-fpm"]

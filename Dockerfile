FROM php:8.1-fpm

# Args defined in docker-compose.yml
ARG user
ARG uid
ARG NODE_VERSION=18

# Install system dependencies
RUN apt-get update \
    && apt-get install -y \
	git \
	curl \
	libpng-dev \
	libonig-dev \
	libxml2-dev \
	libpq-dev \
	zip \
	unzip \
    && curl -sLS https://deb.nodesource.com/setup_$NODE_VERSION.x | bash - \
    && apt-get install -y nodejs \
    && npm install -g npm \
    && curl -sS https://dl.yarnpkg.com/debian/pubkey.gpg | gpg --dearmor | tee /usr/share/keyrings/yarn.gpg >/dev/null \
    && echo "deb [signed-by=/usr/share/keyrings/yarn.gpg] https://dl.yarnpkg.com/debian/ stable main" > /etc/apt/sources.list.d/yarn.list \
    && apt-get update \
    && apt-get install -y yarn \
    && apt-get -y autoremove \
    && apt-get clean && rm -rf /var/lib/apt/lists/* /tmp/* /var/tmp/*
#Clear cache

#Install PHP extensions (use script in image)
RUN docker-php-ext-install pdo_mysql pdo_pgsql mbstring exif pcntl bcmath gd

#Get latest Composer (copy from image "composer:latest" on doker hub all from /usr/bin/composer to local image
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer


# RUN php artisan key:generate \
# && npm install --save-dev vite laravel-vite-plugin \
# && npm run build \
# && composer install


# Create system user to run Composer and Artisan Commands (use ARG of user and uid from begin Dockerfile)
RUN useradd -G www-data,root -u $uid -d /home/$user $user
RUN mkdir -p /home/$user/.composer && \
    chown -R $user:$user /home/$user

# Set working directory
WORKDIR /var/www


# Setw user name to use when running image
USER $user





FROM php:7.3-apache

# # SSH

# # 必要なパッケージと openssh-server
# RUN apt-get update && apt-get install -y \
#     vim \
#     default-mysql-client \
#     openssh-server \
#   && rm -rf /var/lib/apt/lists/*

# # SSH サーバー設定
# RUN mkdir /var/run/sshd \
#     && echo 'root:root' | chpasswd \
#     && sed -i 's/#PermitRootLogin prohibit-password/PermitRootLogin yes/' /etc/ssh/sshd_config \
#     && sed -i 's@session\s*required\s*pam_loginuid.so@session optional pam_loginuid.so@g' /etc/pam.d/sshd

# # 22 番ポートを公開
# EXPOSE 22

# # SSH サービスを起動
# CMD ["/usr/sbin/sshd", "-D"]

# #ホスト名: localhost
# #ポート: 2222
# #ユーザー名: root
# #パスワード: root



# ============================
# 共通: 本番・開発で必要な部分
# ============================

# PHP 設定を反映
COPY ./php.ini /usr/local/etc/php/

# 依存ライブラリ & PHP拡張
RUN apt-get update \
  && apt-get install -y --no-install-recommends \
     libfreetype6-dev \
     libjpeg62-turbo-dev \
     libpng-dev \
     libmemcached-dev \
     zlib1g-dev \
     autoconf \
     build-essential \
  && docker-php-ext-install \
     pdo_mysql \
     mysqli \
     mbstring \
     gd \
     iconv \
  && pecl install memcached \
  && docker-php-ext-enable memcached \
  && pecl install redis-4.2.0 \
  && docker-php-ext-enable redis \
  && rm -rf /var/lib/apt/lists/*

# Apache 設定 (再起動は不要)
COPY ./php_apache2.conf /etc/apache2/mods-enabled

# アプリのソースコードを配置
COPY . /var/www/html/

# ============================
# 開発環境専用: 本番では削除可能
# ============================

# 開発補助ツール
RUN apt-get update && apt-get install -y \
    vim \
    default-mysql-client \
    openssh-server \
  && rm -rf /var/lib/apt/lists/*

nginx:
  ng:
    server:
      config:
        http:
          log_format: |
            upstream_time 
            '$remote_addr - $remote_user [$time_local] ' 
            '"$request" $status $body_bytes_sent '
            '"$http_referer" "$http_user_agent"'
          include:
            - /etc/nginx/sites-enabled/*
    servers:
      managed:
        electio.dev:
          enabled: True
          config:
            - server:
              - listen 80:
                - ''
              - listen [::]:80:
                - ''

              - server_name: 'electio.dev'
              - root: "/var/www/electio/public"
              - index
                - index.html
                - index.htm
                - index.php
              - charset:
                - utf-8

              - error_page 404:
                - /index.php?$query_string
              
              - access_log:
                - /var/log/nginx/electio-access.log
                - upstream_time

              - error_log:
                - /var/log/nginx/electio.dev-error.log
                - error

              - location /:
                - try_files:
                  - $uri
                  - $uri/
                  - /index.php?$query_string

              - location ~ [^/]\.php(/|$):
                - try_files:
                  - $uri
                  - $uri/
                  - /index.php?$query_string
                - fastcgi_split_path_info:
                  - ^(.+\.php)(/.+)$
                - fastcgi_pass:
                  - unix:/run/php/php7.0-fpm.sock
                - fastcgi_index:
                  - index.php
                - include:
                  - fastcgi_params
                - fastcgi_param SCRIPT_FILENAME:
                  - $document_root$fastcgi_script_name
                - fastcgi_param PATH_INFO:
                  - $fastcgi_path_info
                - fastcgi_param HTTP_PROXY:
                  - '""'

              - location ~ /\.ht:
                - deny:
                  - all

              - sendfile:
                - "off"

              - client_max_body_size:
                - 100m

# vim: ft=yaml ts=2 sts=2 sw=2 et
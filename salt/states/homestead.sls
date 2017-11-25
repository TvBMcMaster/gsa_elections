openssl:
  pkg.installed

include:
  - postgres.server

postgres_data_dir:
  file.directory:
    - name: /var/lib/pgsql/data
    - user: postgres
    - group: postgres
    - makedirs: True
    - require_in:
      - cmd: postgresql-cluster-prepared

/etc/nginx/sites-enabled/default:
  file.absent:
    - require_in:
      - service: nginx_service
      
apache2:
  pkg.removed:
    - require_in:
      - service: nginx_service
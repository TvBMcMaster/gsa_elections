postgres:
  use_upstream_repo: False
  
  bin_dir: /usr/lib/postgresql/9.5/bin

  server_bins:
    - initdb
    - pg_controldata
    - pg_ctl
    - pg_resetxlog
    - postgres
    - postgresql95-check-db-dir
    - postgresql95-setup
    - postmaster

  client_bins:
    - clusterdb
    - createdb
    - createlang
    - createuser
    - dropdb
    - droplang
    - dropuser
    - pg_archivecleanup
    - pg_basebackup
    - pg_config
    - pg_dump
    - pg_dumpall
    - pg_isready
    - pg_receivexlog
    - pg_restore
    - pg_rewind
    - pg_test_fsync
    - pg_test_timing
    - pg_upgrade
    - pg_xlogdump
    - pgbench
    - psql
    - reindexdb
    - vacuumdb

  conf_dir: /etc/postgresql/9.5/main

  users:
    homestead:
      ensure: present
      password: 'homestead'
      createdb: False
      createroles: False
      createuser: False

  databases:
    homestead:
      owner: 'homestead'

  acls:
    - ['host', 'homestead', 'homestead', '0.0.0.0/0', 'md5']
    - ['host', 'homestead', 'homestead', '::/0', 'md5']

  postgresconf: |
    listen_addresses = '*'  # listen on all interfaces
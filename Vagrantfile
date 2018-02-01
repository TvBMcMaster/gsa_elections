# -*- mode: ruby -*-
# vi: set ft=ruby :

# All Vagrant configuration is done below. The "2" in Vagrant.configure
# configures the configuration version (we support older styles for
# backwards compatibility). Please don't change it unless you know what
# you're doing.
Vagrant.configure("2") do |config|
  # The most common configuration options are documented and commented below.
  # For a complete reference, please see the online documentation at
  # https://docs.vagrantup.com.

  # Every Vagrant development environment requires a box. You can search for
  # boxes at https://vagrantcloud.com/search.
  # config.vm.box = "bento/ubuntu-16.10"
  config.vm.box = "ubuntu/xenial64"

  config.vm.define "electio" do |electio|

    electio.vm.hostname = "electio"

  # Disable automatic box update checking. If you disable this, then
  # boxes will only be checked for updates when the user runs
  # `vagrant box outdated`. This is not recommended.
  # config.vm.box_check_update = false

  # Create a forwarded port mapping which allows access to a specific port
  # within the machine from a port on the host machine. In the example below,
  # accessing "localhost:8080" will access port 80 on the guest machine.
  # NOTE: This will enable public access to the opened port
    electio.vm.network "forwarded_port", guest: 80, host: 12501
    electio.vm.network "forwarded_port", guest: 5432, host: 5432

  # Create a forwarded port mapping which allows access to a specific port
  # within the machine from a port on the host machine and only allow access
  # via 127.0.0.1 to disable public access
  # config.vm.network "forwarded_port", guest: 80, host: 8080, host_ip: "127.0.0.1"

  # Create a private network, which allows host-only access to the machine
  # using a specific IP.
    electio.vm.network "private_network", ip: "192.168.60.15"

  # Create a public network, which generally matched to bridged network.
  # Bridged networks make the machine appear as another physical device on
  # your network.
  # config.vm.network "public_network"

  # Share an additional folder to the guest VM. The first argument is
  # the path on the host to the actual folder. The second argument is
  # the path on the guest to mount the folder. And the optional third
  # argument is a set of non-required options.
    electio.vm.synced_folder "salt/pillar", "/srv/pillar"
    electio.vm.synced_folder "salt/states", "/srv/salt"
    electio.vm.synced_folder "www", "/var/www/electio", :owner => "www-data", group: "www-data", :mount_options => ["dmode=775", "fmode=664"]
  # Provider-specific configuration so you can fine-tune various
  # backing providers for Vagrant. These expose provider-specific options.
  # Example for VirtualBox:
  #
    electio.vm.provider "virtualbox" do |vb| 
    # Customize the amount of memory on the VM:
      vb.memory = "1024"

      vb.name = "electio"

    end
  #
  # View the documentation for the provider you are using for more
  # information on available options.

    electio.vm.provision :salt do |salt|
      salt.masterless = true
      salt.minion_config = "salt/minion"
      salt.run_highstate = true
      salt.bootstrap_options = "-p python-git"
    end
  end
end

● apache2.service - The Apache HTTP Server
   Loaded: loaded (/lib/systemd/system/apache2.service; disabled; vendor preset: enabled)
   Active: inactive (dead)
     Docs: https://httpd.apache.org/docs/2.4/

[0;1;32m●[0m mysql.service - LSB: Start and stop the mysql database server daemon
   Loaded: loaded (/etc/init.d/mysql; generated)
   Active: [0;1;32mactive (running)[0m since Mon 2021-12-20 14:05:35 GMT; 3min 58s ago
     Docs: man:systemd-sysv-generator(8)
  Process: 2000 ExecStart=/etc/init.d/mysql start (code=exited, status=0/SUCCESS)
    Tasks: 33 (limit: 4915)
   Memory: 107.1M
   CGroup: /system.slice/mysql.service
           ├─2041 /bin/sh /usr/bin/mysqld_safe
           ├─2160 /usr/sbin/mysqld --basedir=/usr --datadir=/var/lib/mysql --plugin-dir=/usr/lib/x86_64-linux-gnu/mariadb19/plugin --user=mysql --skip-log-error --pid-file=/run/mysqld/mysqld.pid --socket=/var/run/mysqld/mysqld.sock
           └─2161 logger -t mysqld -p daemon error

déc. 20 14:05:34 temistocle-PC mysqld[2161]: [0;1;31m[0;1;39m[0;1;31m2021-12-20 14:05:34 0 [Note] InnoDB: Buffer pool(s) load completed at 211220 14:05:34[0m
déc. 20 14:05:35 temistocle-PC mysql[2000]: Starting MariaDB database server: mysqld.
déc. 20 14:05:35 temistocle-PC systemd[1]: Started LSB: Start and stop the mysql database server daemon.
déc. 20 14:05:35 temistocle-PC /etc/mysql/debian-start[2453]: Upgrading MySQL tables if necessary.
déc. 20 14:05:35 temistocle-PC /etc/mysql/debian-start[2457]: [0;1;39m[0;1;31m[0;1;39m/usr/bin/mysql_upgrade: the '--basedir' option is always ignored[0m
déc. 20 14:05:35 temistocle-PC /etc/mysql/debian-start[2457]: [0;1;39m[0;1;31m[0;1;39mLooking for 'mysql' as: /usr/bin/mysql[0m
déc. 20 14:05:35 temistocle-PC /etc/mysql/debian-start[2457]: [0;1;39m[0;1;31m[0;1;39mLooking for 'mysqlcheck' as: /usr/bin/mysqlcheck[0m
déc. 20 14:05:35 temistocle-PC /etc/mysql/debian-start[2457]: [0;1;39m[0;1;31m[0;1;39mThis installation of MySQL is already upgraded to 10.3.29-MariaDB, use --force if you still need to run mysql_upgrade[0m
déc. 20 14:05:35 temistocle-PC /etc/mysql/debian-start[2607]: Checking for insecure root accounts.
déc. 20 14:05:35 temistocle-PC /etc/mysql/debian-start[2611]: Triggering myisam-recover for all MyISAM tables and aria-recover for all Aria tables

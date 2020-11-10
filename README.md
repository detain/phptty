# phptty
A terminal in your browser using websocket php and  [workerman](https://github.com/walkor/Workerman), similar to [gotty](https://github.com/yudai/gotty).

## URLs for future improvements

### Backend Server Libs
* [walkor/crontab: A crontab written in PHP based on workerman](https://github.com/walkor/crontab)
* [walkor/mysql: Long-living MySQL connection for daemon.](https://github.com/walkor/mysql)
* [walkor/http-client: Asynchronous http client for PHP based on workerman.](https://github.com/walkor/http-client)
* [walkor/channel: Interprocess communication component for workerman](https://github.com/walkor/channel)
* [walkor/workerman-vmstat: 在浏览器里面显示以更友好的方式实时显示vmstats信息，包括内存、IO、cpu等信息](https://github.com/walkor/workerman-vmstat)
* [walkor/redis-queue: Message queue system written in PHP based on workerman and backed by Redis.](https://github.com/walkor/redis-queue)
* [walkor/phptty: Share your terminal as a web application. PHP terminal emulator based on workerman.](https://github.com/walkor/phptty)

### SSH

#### Async SSH Clients

* [dazzle-php/ssh: Dazzle Async SSH](https://github.com/dazzle-php/ssh)
* [clue/reactphp-ssh-proxy: Async SSH proxy connector and forwarder, tunnel any TCP/IP-based protocol through an SSH server, built on top of ReactPHP.](https://github.com/clue/reactphp-ssh-proxy)
* [amphp/ssh: Async SSH client for PHP based on Amp.](https://github.com/amphp/ssh)

#### SSH Classes/Libs

* [spatie/ssh: A lightweight package to execute commands over an SSH connection](https://github.com/spatie/ssh)
* [Herzult/php-ssh: An experimental object oriented SSH api in PHP](https://github.com/Herzult/php-ssh)
* [netojoaobatista/ssh: Simple SSH client in PHP](https://github.com/netojoaobatista/ssh)
* [members/ssh: ssh2 client for php](https://github.com/members/ssh)
* [DivineOmega/php-ssh-connection: Provides an elegant syntax to connect to SSH servers and execute commands.](https://github.com/DivineOmega/php-ssh-connection)
* [bubba-h57/PHP-SSH2: Concrete Implementation of SSH2](https://github.com/bubba-h57/PHP-SSH2)
* [oncesk/ssh2: Library which provide you ability execute remote commands as in terminal](https://github.com/oncesk/ssh2)
* [PHP: ssh2_shell - Manual](https://www.php.net/manual/en/function.ssh2-shell.php)

#### Graphing Log Data

* [jalgroy/ssh-map](https://github.com/jalgroy/ssh-map)

#### Filesystem/FS/File Access
 
* [oliwierptak/flysystem-ssh-shell: SSH/Shell adapter for league/flysystem](https://github.com/oliwierptak/flysystem-ssh-shell)

#### Web Panels / Frontends

* [xtermjs/xterm.js: A terminal for the web](https://github.com/xtermjs/xterm.js)
* [roke22/PHP-SSH2-Web-Client: PHP Web Client to connect by SSH to another servers](https://github.com/roke22/PHP-SSH2-Web-Client)
* [pagemachine/authorized-keys: Read, edit and write the SSH authorized_keys file](https://github.com/pagemachine/authorized-keys)
* [Dshufeng/remote-web: remote web by VNC RDP SSH](https://github.com/Dshufeng/remote-web)
* [operasoftware/ssh-key-authority: A tool for managing SSH key access to any number of servers.](https://github.com/operasoftware/ssh-key-authority)
* [cubiclesoft/php-ssh: Manage SSH keys, connection profiles, and connect to SSH and SFTP servers with a pure PHP-based command-line solution. MIT or LGPL.](https://github.com/cubiclesoft/php-ssh)
* [codeaken/sshkey: Library for working with and generating SSH keys](https://github.com/codeaken/sshkey)
* [pacoorozco/ssham: SSH Access Manager](https://github.com/pacoorozco/ssham)
* [altayalp/php-ftp-client: Object oriented library for FTP and SFTP (ssh ftp) process.](https://github.com/altayalp/php-ftp-client)
* [malikshi/sshpanel: An easy panel to manage SSH Account](https://github.com/malikshi/sshpanel)
* [Can a Terminal window be resized with a Terminal command](https://apple.stackexchange.com/questions/33736/can-a-terminal-window-be-resized-with-a-terminal-command)

## Notes

### XTerm Events

* *onBinary*: Adds an event listener for when a binary event fires. This is used to enable non UTF-8 conformant binary messages to be sent to the backend. Currently this is only used for a certain type of mouse reports that happen to be not UTF-8 compatible. The event value is a JS string, pass it to the underlying pty as binary data, e.g.. `pty.write(Buffer.from(data, 'binary'))`.
* *onCursorMove*: Adds an event listener for the cursor moves.
* *onData*: Adds an event listener for when a data event fires. This happens for example when the user types or pastes into the terminal. The event value is whatever `string` results, in a typical setup, this should be passed on to the backing pty.
* *onKey*: Adds an event listener for when a key is pressed. The event value contains the string that will be sent in the data event as well as the DOM event that triggered it.
* *onLineFeed*: Adds an event listener for when a line feed is added.
* *onRender*: Adds an event listener for when rows are rendered. The event value contains the start row and end rows of the rendered area (ranges from `0` to `Terminal.rows - 1`).
* *onResize*: Adds an event listener for when the terminal is resized. The event value contains the new size.
* *onScroll*: Adds an event listener for when a scroll occurs. The event value is the new position of the viewport.
* *onSelectionChange*: Adds an event listener for when a selection change occurs.
* *onTitleChange*: Adds an event listener for when an OSC 0 or OSC 2 title change occurs. The event value is the new title.


# Screenshot
![Screenshot](https://github.com/walkor/phptty/blob/master/Web/imgs/example.gif?raw=true)

# Live demo
[Live demo](http://47.88.13.70:7779/)

# install
1. ```git clone https://github.com/walkor/phptty```
2. ```cd phptty```
3. ```composer install```

# Start and stop
**start**  
```php start.php start -d```   

Visit ```http://ip:7779``` in your browser.

**stop**  
```php start.php stop```

# Related links
[https://github.com/yudai/gotty](https://github.com/yudai/gotty)  
[https://github.com/chjj/term.js](https://github.com/chjj/term.js)    
[https://github.com/walkor/Workerman](https://github.com/walkor/Workerman)    


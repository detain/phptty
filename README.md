# phptty
A terminal in your browser using websocket php and  [workerman](https://github.com/walkor/Workerman), similar to [gotty](https://github.com/yudai/gotty).

## Server Notes

* Each connection has a 'ima' status tied to it which can be
  * guest - unauthenticated connections likely from client browsers
  * client - authenticated client connection
  * admin - authenticated admin connection
  * system - authenticated cnnection from remote systemn or integration

## Message Protocol Notes

### Websocket Message Rules

* All messages (sent and received) MUST BE formatted in JSON
* All messages have a 'type' field specifying the specific message action (such as login or say)
* Client MUST respond to 'ping' type messages with a 'pong' type message


### Websocket _type_ Actions

* login - authenticates with the system
  * parameters for username + passsword auth
	* ima
	* username
	* password
  * parameters for existing session auth
	* ima
	* session_id
  * parameters for integration / system auth
	* ima
	* api_key
	* api_secret 
* logouut - deauthenticate and close a connection
  * optional parameter
	* disconnect - boolean indicating whether ot disconnect after logout or stay in and unauthenticated (defaults to true)
* say - sends a message
  * parameters
	* from
	* is
	* to
	* content
* ping - a request to see if the server or client is still alive
* pong - a response letting the ping initializor we are up and responding
* status - retreives information about the running status of the system including client connections, tasks, timers, counters, etc.
  * optional parameter
	* what - what to show, any combination of (defaults to all)
	  * all
	  * clients
	  * timers
	  * log
	  * processes
* run - starts running a program
  * parameters
	* command
  * optional parameters
	* host - host to run it on instead of the local system (defaults to false for local run)
	* interactive - boolean, whether to enable stdin or not (defaults to true)
	* pty - boolean whether to enable pty use instead of pipes (deafults to true)
	* height - terminal height (defaults to 24)
	* width - terminal width (defaults to 80)
* running - used to send new output and input to the process
  * optional parameters
	* stdin - input to send to the process
	* stdout - output from the process
	* stderr - error output from the process
* ran - used to indicate a running process has finished
  * parameters
	* id - the process id
  * optional parameters
	* code - the exit code
	* term - the terminal signal if it recieved one 
	  
## Protocols To Support

### Immdiate Support

* Websocket
* Socket.IO

### Future Support

* WebRTC
* JSON-RPC
* Thrift-RPC
* HTTP Polling via REST
* Server-Sent Events (SSE)
* HTTP/2 Server Push 
* XMPP

## URLs for future improvements

### XML-RPC Libs
* [plesk/api-php-lib: PHP library for Plesk XML-RPC interface](https://github.com/plesk/api-php-lib)
* [irazasyed/xml-rpc-ping: PHP XML-RPC Service Pinger](https://github.com/irazasyed/xml-rpc-ping)
* [letrunghieu/wordpress-xmlrpc-client: A PHP XML-RPC client for Wordpress websites](https://github.com/letrunghieu/wordpress-xmlrpc-client)
* [picklingjar/Wordpress-XML-RPC-Library: A PHP library for interacting with Wordpress via XML-RPC](https://github.com/picklingjar/Wordpress-XML-RPC-Library)
* [DarkaOnLine/Ripcord: XML RPC client and server around PHP's xmlrpc library](https://github.com/DarkaOnLine/Ripcord)
* [esler/json-rpc: Simple async JSON-RPC library build on top of the GuzzleHttp](https://github.com/esler/json-rpc)
* [wilderamorim/updateservices: Update services is a tool that you can use to let other people know that you've updated your blog. Similar to what WordPress does when sending an XML-RPC ping, automatically notifying popular update services when you update your blog.](https://github.com/wilderamorim/updateservices)
* [protophp/protophp: ProtoPHP is an asynchronous binary protocol for inter-service communication in PHP applications.](https://github.com/protophp/protophp)
* [FIGUS97/XMLRPC-Sockets-UDP-TCP-Communication: Little apps to train communicate via XML/RPC, SOAP, Sockets - for studies](https://github.com/FIGUS97/XMLRPC-Sockets-UDP-TCP-Communication)
* [75k/Markdown-To-HTML-Of-XML-RPC: 一个WordPress插件](https://github.com/75k/Markdown-To-HTML-Of-XML-RPC)
* [fpoirotte/XRL: A very simple XML-RPC library (client + server) written in PHP](https://github.com/fpoirotte/XRL)
* [Ang3/php-xmlrpc-client: PHP XML-RPC client](https://github.com/Ang3/php-xmlrpc-client)
* [lstrojny/fxmlrpc: A modern, super fast XML/RPC client for PHP >=5.6](https://github.com/lstrojny/fxmlrpc)
* [MegaChriz/remotedb: Client-side module to exchange information with a remote database via XML-RPC.](https://github.com/MegaChriz/remotedb)
* [kv4X/News-scraper: This script scrape news from websites and publish it on your wordpress website using xml-rpc.](https://github.com/kv4X/News-scraper)
* [jeremyfelt/log-xmlrpc-requests: Log incoming XML-RPC requests to a WordPress site](https://github.com/jeremyfelt/log-xmlrpc-requests)
* [comodojo/rpcclient: XML and JSON(2.0) RPC client](https://github.com/comodojo/rpcclient)
* [comodojo/rpcserver: Framework-independent XML and JSON(2.0) RPC server](https://github.com/comodojo/rpcserver)
* [jasurbek-khanjarov/xml-rpc-request-guzzle: Sending xml-rpc request with using Guzzle](https://github.com/jasurbek-khanjarov/xml-rpc-request-guzzle)


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


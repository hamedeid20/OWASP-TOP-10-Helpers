<h1 align="left">Collaborator Server PHP</h1>

###

<p align="left">Welcome to the Collaborator Server PHP repository! This project provides a PHP-based implementation for logging and analyzing HTTP requests, inspired by the functionality of the Burp Suite Collaborator. The server captures incoming HTTP POST requests, extracts and logs request details including headers and body content, and saves this information into structured log files.</p>

###

<h2 align="left">Key Features</h2>

###

<p align="left"><b>Flexible Logging :</b> Logs details of HTTP POST requests, including headers and body content, into specified or auto-generated log files.<br><b>Time-Zone Configuration :</b> Supports setting a custom time zone for accurate logging.<br><b>Dynamic File Handling :</b> Automatically generates new log files if no filename is provided, ensuring organized session logs.<br><b>Error Logging :</b> Captures and logs errors when non-POST requests are made</p>

###

<h2 align="left">Usage</h2>

###

<p align="left">To use this Collaborator Server, you simply need to deploy the provided PHP scripts on your server and configure your HTTP clients to send POST requests to it. The server will handle the rest, logging each request in a detailed manner for further analysis.</p>

###

<h2 align="left">Sample Request</h2>

###
```

curl -X POST -H "Content-Type: application/json" -d '{"key1":"value1", "key2":"value2"}' http://your-server/index.php

```
###

<h2 align="left">Project Structure</h2>

###

<p align="left"><b>CollaboratorV1.php :</b> Main class handling the request logging.<br><b>DateHandling.php :</b> Helper class for managing date and time operations.<br><b>collaborator.php :</b> Entry point script that initializes and uses the CollaboratorV1 class</p>

###

<h2 align="left">Contributing</h2>

###

<p align="left">Contributions are welcome! If you have ideas for improvements or new features, please open an issue or submit a pull request.</p>

###
# My Blog
<p align="center">
    <img src="images/attack1.png"/>
</p>

My Blog is a simple Wordpress application that contains an example of an Insufficient Logging & Monitoring vulnerability and, its main goal is to demonstrate how important it is to properly log all requests made to the application and how easily malicious requests could go unnoticed.

## Index

- [Definition](#what-is-insufficient-logging-&-monitoring)
- [Setup](#setup)
- [Attack narrative](#attack-narrative)
- [Objectives](#secure-this-app)
- [Solutions](#pr-solutions)

## What is Insufficient Logging & Monitoring?

Insufficient logging and monitoring, coupled with missing or ineffective integration with incident response, allows attackers to further attack systems, maintain persistence, pivot to more systems, and tamper, extract, or destroy data. Most breach studies show time to detect a breach is over 200 days, typically detected by external parties rather than internal processes or monitoring.

## Setup

To start this intentionally **insecure application**, you will need [Docker][Docker Install] and [Docker Compose][Docker Compose Install]. After forking [b3d3cLabs](https://github.com/b3d3c/b3d3cLabs), you must type the following commands to start:

```sh
cd b3d3cLabs/owasp-top10-2017/a10/my-blog
```

```sh
make install
```

Then simply visit [localhost:80][App] ! 😆

## Get to know the app 🎮

To properly understand how this application works, you can follow these simple steps:

- Visit its homepage!
- Take a look at the different posts. 

## Attack narrative

Now that you know the purpose of this app, what could go wrong? The following section describes how an attacker could identify and eventually find sensitive information about the app or its users. We encourage you to follow these steps and try to reproduce them on your own to better understand the attack vector! 😜

### 👀

#### Poor application log might mask malicious requests made to the server

To verify how an application handles events that are considered malicious, two attacks will be done to test it:
* Brute forcing the login screen
* Editing source code

Initially, we begin the first attack by sending an intentionally wrong login attempt, as shown by the image below:

<p align="center">
    <img src="images/attack2.png"/>
</p>

## 🔥

After that, an attacker could use [Burp Suite] as a proxy to send as many requests as needed until a valid password is found (if you need any help setting up your proxy, you should check this [guide](https://support.portswigger.net/customer/portal/articles/1783066-configuring-firefox-to-work-with-burp)). To do so, after finding the login POST request, right click and send to `Intruder`, as shown below:

<p align="center">
    <img src="images/attack3.png"/>
</p>

In the Positions tab, all fields must be cleared first via the `Clear §` button. To set `log` and `pass` to change according to each password from our dictionary wordlist, simply click on `Add §` button after selecting each: att4

<p align="center">
    <img src="images/attack4.png"/>
</p>

After that, change Attack type from `Snipper` to `Cluster bomb`:

<p align="center">
    <img src="images/attack5.png"/>
</p>


If a valid password is found, the application may process new cookies and eventually redirect the flow to other pages. To guarantee that the brute force attack follows this behavior, set `Always` into `Follow Redirections` options in the `Options` tab, as shown below:

<p align="center">
    <img src="images/attack10.png"/>
</p>

You can use the following wordlist for Payload set 1:

```
user
other
admin
administrator
blank
```

And the following wordlist for Payload set 2:

```
password
123
admin
qweasd
1qaz
123456789
```

In the `Payloads` tab, Payload set `1`, simply copy the wordlist and then click on `Paste` option.

<p align="center">
    <img src="images/attack6.png"/>
</p>

Do the same for Payload set `2` and then the attack may be performed via the `Start attack` button. 

<p align="center">
    <img src="images/attack7.png"/>
</p>

Before executing the attack, you can open a new tab in your terminal and type the following command to observe how the malicious requests will come to the app:

```sh
docker logs deployments_wordpress_1 -f
```

As we can see from the results of the requests, the application handles successful and unsuccessful requests differently by responding to different status codes. As shown below, when the payload is correct the application responds a status code `302 FOUND`, otherwise it responds with a `200 OK`.

<p align="center">
    <img src="images/attack8.png"/>
</p>

By having a look at the application on the server side, it's possible to see that the logs provide little information regarding the attack, as shown below:

<p align="center">
    <img src="images/attack9.png"/>
</p>


## Secure this app

How would you mitigate this vulnerability? After your changes, the new log system must give us: 

* Who did the request
* What happened
* When did it happen
* Where did it happen


## Contributing

* Docker Install:  https://docs.docker.com/install/
* Docker Compose Install: https://docs.docker.com/compose/install/
* App: http://localhost:80
* Burp Suite: https://portswigger.net/burp

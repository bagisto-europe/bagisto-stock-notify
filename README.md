<div align="center">
    <img src="https://bagisto.com/wp-content/themes/bagisto/images/logo.png" alt="Bagisto Logo" />
    <h2>Stock Notify</h2>
</div>

<div align="center">
    <img alt="GitHub version" src="http://poser.pugx.org/bagisto-eu/stock-notify/v">
    <img alt="Packagist Downloads (custom server)" src="https://img.shields.io/packagist/dt/bagisto-eu/stock-notify">
    <img alt="GitHub license" src="https://img.shields.io/github/license/bagisto-europe/stock-notify">
</div>

## Table of Contents
1. [Introduction](#introduction)
2. [Installation](#installation)
3. [Requirements](#requirements)
4. [Configuration](#configuration)

## Introduction
With Stock Notify, you can take the guesswork out of managing your product stock levels.  
This package revolutionizes the way you monitor your inventory by providing an automated solution for notifying you when your product stock reaches a predefined threshold.

No more last-minute stock shortages causing customer dissatisfaction or revenue loss.  
Stock Notify seamlessly integrates into your Bagisto e-commerce platform and empowers you with real-time insights into your inventory health.

Key Features:
- **Automated Notifications:** Receive timely notifications via export (xlsx) files straight to your mailbox when product stock levels approach your set threshold.
- **Flexible Scheduling:** Choose from hourly, daily, or weekly notification schedules, ensuring you stay informed at a frequency that suits your business needs.
- **Streamlined Configuration:** Effortlessly configure notification settings, enabling you to tailor Stock Notify to your specific inventory management requirements.
- **Seamless Integration:** Stock Notify seamlessly integrates into your Bagisto admin panel, ensuring a hassle-free setup process.

Say goodbye to manual stock monitoring and hello to proactive inventory management with Stock Notify. Elevate your e-commerce operations, eliminate stock-related uncertainties, and provide a superior shopping experience for your customers.

## Installation
```bash
composer require bagisto-eu/stock-notify
```
After installing the package, execute the following command:
```bash
php artisan optimize
```

## Requirements
To enable timely notifications, you need to set up a **cron configuration** that runs the `artisan schedule:run` command every minute on your server.  
This command is essential for executing the scheduled tasks that trigger Stock Notify notifications.

Here's an example of the cron configuration that you can add to your server's crontab:
```bash
* * * * * cd /path-to-your-bagisto-folder && php artisan schedule:run >> /dev/null 2>&1
```
Replace `/path-to-your-bagisto-folder` with the actual path to your Bagisto installation folder.  
This configuration ensures that the scheduled tasks are executed every minute, enabling Stock Notify to function seamlessly.

## Configuration
1. Navigate to **Configure → Catalog → Inventory** in your Bagisto admin panel.
2. Enable the option for `Send a notification when products reach the threshold`.
3. Define the schedule for notifications (hourly, daily, or weekly).
4. Set the minimum stock threshold for triggering notifications.

![Configuration Settings](docs/settings.PNG)

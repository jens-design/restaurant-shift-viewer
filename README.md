# Restaurant Shift Viewer

## Project Description
Restaurant Shift Viewer is a lightweight web application designed to help restaurant staff check their weekly schedules. Staff can log in to view their assigned shifts, while managers can add or update the roster. 

Given the hardware constraints of the target deployment environment (Raspberry Pi Zero 2W), this application prioritizes efficiency and a minimal footprint. It avoids heavy framework dependencies in favor of a straightforward, resource-friendly implementation.

## Architecture & Technology Stack
This project follows a standard 3-tier web architecture:

* **Presentation Tier (Client):** HTML5 and embedded CSS for a simple, responsive user interface that requires minimal client-side processing.
* **Application Tier (Server):** PHP handling the business logic, session management, and database routing. 
* **Data Tier (Database):** A Relational Database (MySQL/MariaDB) optimized with a basic schema normalized to 3NF (e.g., separate tables for `Employees` and `Shifts` to reduce redundancy and save storage).

## Target Application & Deployment
The target deployment device is a **Raspberry Pi Zero 2W**. To ensure the application runs within the device's limited memory and processing capabilities:
* The application relies on lightweight, native PHP functions rather than heavy external libraries.
* Database queries are kept simple and indexed to reduce CPU load on the RPi.
* The frontend uses minimal assets to ensure fast delivery over local networks.

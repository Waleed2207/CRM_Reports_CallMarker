<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>


# README - CRM Report Feature in Laravel

## Overview
This feature enhances the CRM system by adding a report generation capability, allowing users to view and filter call data based on various criteria. The report includes detailed information about the calls, such as customer name, email, phone number, agent, call duration, and timestamp. The feature is designed to handle large datasets efficiently and supports dynamic filtering options.

## Approach

### Models and Relationships:
- The `Customer`, `Agent`, and `Call` models are set up with appropriate relationships using Laravel's Eloquent ORM.
- The `Customer` model has a `hasMany` relationship with the `Call` model, indicating that each customer may have many calls. Additionally, the `Customer` model includes fields for `email` and `phone_number`.
- The `Agent` model has a `hasMany` relationship with both the `Customer` and `Call` models, indicating that each agent may have many customers and many calls.
- The `Call` model includes metadata such as duration and timestamp to capture the relevant details of each call. It also has `belongsTo` relationships with both the `Customer` and `Agent` models, ensuring each call is linked to a specific customer and agent.

### Controller:
- The `ReportController` is responsible for handling the report generation logic.
- Dynamic filtering is implemented in the controller based on request parameters, allowing the report to be filtered by agent, customer, start and end dates, call duration, email, and phone number.
- The backend is designed to be flexible and ready to handle future attributes such as direction for calls without requiring changes to the backend logic. This ensures that only frontend adjustments are needed when new filtering criteria are introduced.
- The controller prepares the query with eager loading of related customer and agent models to optimize performance.

### Blade Template:
- The `index.blade.php` template provides a user-friendly interface for viewing the report and applying filters.
- The template includes dropdowns for selecting agents and customers, date pickers for start and end dates, input fields for filtering by call duration, email, and phone number.
- Pagination is used to efficiently display large datasets, ensuring that the UI remains responsive even with a significant number of records.

### Optimizations:
- The filtering logic is dynamic and flexible, allowing easy addition of new filters without altering the core logic.
- Eager loading is used to reduce the number of queries and improve the performance of the report generation.
- Pagination ensures that only a subset of records is fetched and displayed at any given time, optimizing memory usage and rendering times.

### Bonus Features:
- Additional filters such as `customer_id`, `email`, and `phone_number` demonstrate the system's adaptability and scalability for future requirements.
- The structure of the code allows for easy extensions, such as adding more complex filters or exporting the report data.

## Assumptions
- The existing CRM system adheres to Laravel's naming conventions and standard practices.
- Users are expected to have a basic understanding of Laravel's Eloquent ORM, Blade templating, and routing.
- The database is populated with valid data for agents, customers, and calls, ensuring that the report displays meaningful results.

## Steps Taken
- **Model Setup**: Defined the `Customer`, `Agent`, and `Call` models with the appropriate relationships (`hasMany` and `belongsTo`). Added fields for `email` and `phone_number` to the `Customer` model.
- **Controller Development**: Implemented the `ReportController` to manage the report generation and filtering logic.
- **Blade Template Creation**: Developed `index.blade.php` to display the report and provide filtering options to the user.
- **Dynamic Filtering Implementation**: Added support for filtering by various criteria dynamically based on request parameters. The backend is designed to accommodate future filters seamlessly.
- **Performance Optimization**: Used eager loading and pagination to optimize the handling of large datasets.
- **Bonus Implementation**: Demonstrated the flexibility of the filtering system with additional filters for `customer_id`, `email`, and `phone_number`.

## How to Use
- Access the report by navigating to the `/reports` route in your Laravel application.
- Utilize the filters provided in the form to refine the list of calls based on agent, customer, date range, call duration, email, and phone number.
- The results are displayed in a paginated table format, allowing for easy navigation through the dataset.

## Notes
- Ensure that the database is seeded with relevant data for agents, customers, and calls to generate meaningful reports.
- The filtering logic can be extended by adding more fields in the Blade template and adjusting the controller accordingly.

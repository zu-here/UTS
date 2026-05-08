# Viva Preparation - Driver/Staff Dashboard (M. Hafizur Rahman)

This document contains possible viva questions and answers related to your part of the UTS project.

---

## 1. Project Overview & Features

**Q: What was your specific responsibility in this group project?**
**A:** I was responsible for the **Driver/Staff Dashboard**. This includes managing bus statuses (seat/payment), enrolling fuel costs, requesting maintenance/expenses from the admin, and providing feedback. I also implemented the **Authentication system** (Login/Registration) for the dashboard.

**Q: How does the "Seat Status" feature benefit the students?**
**A:** When a driver sets the status to "Stand," it indicates the bus is full but has standing room. According to the project requirements, students who don't get a seat receive a 50% discount. This status helps the system automate that subsidy.

**Q: What is the purpose of the "Expense Request" feature?**
**A:** It allows drivers to report the need for heavy expenses like engine oil, tires, or body parts. These requests are sent to the Admin dashboard for approval based on vacancy and student comfort.

---

## 2. Laravel Framework & MVC

**Q: Can you explain the MVC architecture in your part?**
**A:** 
- **Model:** I created models like `FuelLog` and `ExpenseRequest` to interact with the database tables.
- **View:** I used **Blade templates** (e.g., `dashboard.blade.php`) to create the user interface using Bootstrap 5.
- **Controller:** The `DriverDashboardController` handles the logic, such as saving fuel logs or updating bus status.

**Q: What are Laravel Migrations, and why did you use them?**
**A:** Migrations are like "version control" for the database. Instead of sharing a SQL file, I wrote PHP code to define tables. For example, I created a migration to add `seat_status` and `payment_method` to the existing `buses` table.

**Q: How do you handle routing in your project?**
**A:** All routes are defined in `routes/web.php`. I used **Route Groups** and **Middleware** (specifically the `auth` middleware) to ensure only logged-in drivers can access the dashboard.

---

## 3. Authentication & Database

**Q: How does your registration process work?**
**A:** I used the `AuthController`. When a driver registers, the system:
1. Validates the input (email, password).
2. Generates a unique **String ID** (e.g., `USR-177823...`) because our team decided not to use auto-incrementing numbers for IDs.
3. Hashes the password using `Hash::make()` for security.
4. Saves the user with default values for `department` (Staff) and `location`.

**Q: Why is your "Recent Activity Summary" user-centric?**
**A:** I added a `user_id` foreign key to the `fuel_logs` and `expense_requests` tables. In the controller, I filter the data using `Auth::id()` so that a driver only sees their own history, not everyone else's.

**Q: What database are you using for this project?**
**A:** For local development and ease of demonstration, I configured the project to use **SQLite**. It stores the entire database in a single file (`database.sqlite`), which is very portable.

---

## 4. Technical Implementation Details

**Q: What is "Mass Assignment" in Laravel, and did you face any issues with it?**
**A:** Mass assignment is a security feature where you must explicitly list which fields can be filled in a model using the `$fillable` property. I had to add `id`, `seat_status`, and `payment_method` to the `Bus` model's `$fillable` array to allow updates from the dashboard.

**Q: How did you implement the Logout feature?**
**A:** I created a `logout` method in the `AuthController` that calls `Auth::logout()`, invalidates the session, and regenerates the CSRF token to prevent security risks.

**Q: How do you pass data from the Controller to the View?**
**A:** In the `index` method of `DriverDashboardController`, I fetch the data using Eloquent (e.g., `Bus::first()`) and pass it to the view using the `compact()` function.

---

## 5. Collaboration (Git)

**Q: How did you manage your code in the group?**
**A:** We used GitHub. I worked on a specific branch called `hafizur`. I pulled the team's base code, merged my dashboard features into it, and pushed it back to my branch without affecting the main branch or other members' work.

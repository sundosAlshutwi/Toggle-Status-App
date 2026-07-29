# Toggle Status App

A simple web app that connects a webpage to a MySQL database using HTML, CSS, JavaScript, and PHP.

**Live demo:** [togglestatus.freedev.app](http://togglestatus.freedev.app/index.php)

## What it does
- A one-line form to submit a **Name** and **Age**.
- Submitted data is saved into a MySQL table (`users`).
- All records are displayed in a table below the form.
- Each record has a **Toggle** button that switches its `status` value between `0` and `1`.
- The status updates instantly on the page using AJAX (JavaScript `fetch`) — no page reload needed.

## Files
| File | Purpose |
|---|---|
| `index.php` | Main page: form + table displaying all records |
| `toggle.php` | Handles the AJAX request that flips a record's status in the database |
| `config.php` | Database connection settings (host, user, password, db name) |
| `database.sql` | SQL script to create the `users` table |
| `style.css` | Page styling |
| `script.js` | AJAX logic for the Toggle button |

## How it works
1. **Form submit (index.php):** The form sends a POST request to `index.php`, which inserts the name and age into the `users` table using a prepared statement (`mysqli` + `bind_param`) to prevent SQL injection. The page then queries all records and renders them in an HTML table.
2. **Toggle button (script.js + toggle.php):** Clicking "Toggle" sends the record's `id` via `fetch()` to `toggle.php`, which reads the current status from the database, flips it (0 -> 1 or 1 -> 0), updates it, and returns the new value as JSON. JavaScript then updates only that status cell on the page — no refresh required.

## Setup (hosted on InfinityFree)
1. Create a MySQL database from the InfinityFree control panel.
2. Import `database.sql` using phpMyAdmin to create the `users` table.
3. Edit `config.php` with your database host, username, password, and database name.
4. Upload all files to the `htdocs` folder via File Manager or FTP.
5. Open your site, submit a name/age, and test the Toggle button.

# Product Selling Website

## Introduction
This project is a fully functional product selling website designed to simulate an e-commerce platform. Users can browse products, add them to the cart, and proceed to checkout. Additionally, it features an admin panel for managing products and categories. The website is built with PHP for server-side logic, HTML, CSS, and JavaScript for a seamless user interface and interactivity.

## Features
- **Product Listing**: Displays a grid of products with images, prices, and details.
- **Cart Management**: Add, remove, and update product quantities in the shopping cart.
- **User Authentication**: Secure login and logout functionalities.
- **Product Categories**: Organized product categories for easier navigation.
- **Admin Panel**: Manage products and categories, including adding, editing, and deleting items.
- **Responsive Design**: Optimized for both desktop and mobile devices.
- **Checkout**: Calculates totals and manages purchases.

## Technologies Used
- **PHP**: Backend logic and server-side scripting.
- **JavaScript**: Handles cart interactions and updates.
- **HTML & CSS**: Structures and styles the website (including `style.css` and `css.css`).
- **SQL**: Database for user accounts, product information, and admin data.

## Installation
### Prerequisites
1. A local server environment (e.g., XAMPP, WAMP, or MAMP).
2. A database management system (e.g., MySQL).

### Steps
1. Clone or download the repository.
2. Import the `lojaprodutos.sql` file into your database.
3. Configure the database connection in `conexaoBd.php` if required.
4. Place the project folder in the `htdocs` directory of your local server.
5. Ensure your local server is running.
6. Open a web browser and navigate to `http://localhost/<project-folder-name>/index.php`.

## File Structure
### User Interface
- `index.php` and `index.html`: Main entry points displaying the product list and homepage.
- `login.php` and `logout.php`: Handle user login and logout functionalities.
- `carrinho.php` and `carrinho.html`: Shopping cart functionality.
- `detalhe.php` and `detalhe.html`: Product detail pages.
- `processalogin.php`: Processes user login requests.
- `processaCONTAnova.php`: Handles new account creation.
- `modelodados.php`: Database interaction logic.
- `conexaoBd.php`: Database connection setup.
- `index.js`: Manages cart interactions and updates.
- `style.css` and `css.css`: Styles the website's layout and components.
- `footer.php` and `top.php`: Reusable footer and navigation components.

### Admin Panel
- `admin/index.php`: Admin dashboard.
- `admin/admin-login.php` and `admin/admin-login.html`: Admin login functionality.
- `admin/admin-inserirproduto.php`: Interface for adding new products.
- `admin/admin-inserirCategoria.php`: Interface for adding new categories.
- `admin/admin-processalogin.php`: Processes admin login.
- `admin/admin-processaInserirproduto.php`: Processes product additions.
- `admin/admin-processaInserirCategoria.php`: Processes category additions.
- `admin/admin-processaAlteraproduto.php`: Handles product updates.
- `admin/eliminaproduto.php` and `admin/processaEliminaproduto.php`: Manage product deletions.
- `admin/admin-style.css`: Styles for the admin panel.
- `admin/scripts/scripts.js`: JavaScript for admin functionality.
- `admin/top.php` and `admin/footer.php`: Reusable components for admin pages.

### Assets
- **Images**: Located in the `images` folder, including product images, icons, and banners.
- **SQL**: `lojaprodutos.sql` file for setting up the database structure.

## Usage
1. Open the application in your browser.
2. Browse through the product catalog.
3. Add desired products to your cart and view the cart summary.
4. Log in or create a new account to proceed with checkout.
5. Use the admin panel to manage products and categories.

## Credits
- Icons and images: [Flaticon](https://www.flaticon.com/) and custom resources.

## License
This project is licensed under the MIT License. You are free to use, modify, and distribute the code as per the license terms.


CREATE TABLE IF NOT EXISTS users (
  id SERIAL PRIMARY KEY,
  last_name VARCHAR(100) NOT NULL,
  first_name VARCHAR(100) NOT NULL,
  age SMALLINT CHECK (age >= 0) DEFAULT 0,
  phone_number VARCHAR(20) NOT NULL UNIQUE,
  email VARCHAR(255) UNIQUE DEFAULT 'Non defini',
  address VARCHAR(255) DEFAULT 'Non defini',
  password_hash VARCHAR(255) NOT NULL,
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  role VARCHAR(20) CHECK (role IN ('admin', 'user', 'artisant')) DEFAULT 'user'
  );
  -- products_categories
  CREATE TABLE IF NOT EXISTS products_categories (
    id SERIAL PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    description TEXT,
    img_url VARCHAR(255),
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
  );

  -- insert into products_categories
  INSERT INTO products_categories (name, description, img_url) VALUES
  ('Electronics', 'Devices and gadgets', '/assets/img/produits/masque.png'),
  ('Clothing', 'Apparel and accessories', '/assets/img/produits/pagne.png'),
  ('Home & Kitchen', 'Household items and kitchenware', '/assets/img/produits/sculpture.png'),
  ('Books', 'Literature and educational materials', '/assets/img/produits/poteries.png');

  -- products
  CREATE TABLE IF NOT EXISTS products (
    id SERIAL PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    description TEXT,
    price DECIMAL(10, 2) NOT NULL,
    stock INT CHECK (stock >= 0),
    category_id INT NOT NULL,
    img_url VARCHAR(255) NOT NULL,
    dimensions VARCHAR(50) DEFAULT 'N/A',
    origin VARCHAR(100) DEFAULT 'N/A',
    author_id INT NOT NULL,
    material VARCHAR(100) DEFAULT 'N/A',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (category_id) REFERENCES products_categories(id),
    FOREIGN KEY (author_id) REFERENCES users(id)
  );

  -- insert 10 products
  INSERT INTO products (name, description, price, stock, category_id, img_url, dimensions, origin, author_id, material) VALUES
  ('Wireless Headphones', 'Bluetooth over-ear headphones with noise cancellation.', 89.99, 50, 1, '/assets/img/produits/masque.png', 'N/A', 'N/A', 3, 'N/A'),
  ('Bluetooth Speaker', 'Portable Bluetooth speaker with high-quality sound.', 49.99, 20, 2, '/assets/img/produits/pagne.png', 'N/A', 'N/A', 3, 'N/A'),
  ('Smartphone Case', 'Durable case for iPhone and Samsung smartphones.', 15.99, 150, 3, '/assets/img/produits/sculpture.png', 'N/A', 'N/A', 3, 'N/A'),
  ('Laptop Stand', 'Adjustable laptop stand for ergonomic use.', 39.99, 75, 4, '/assets/img/produits/poteries.png', 'N/A', 'N/A', 3, 'N/A'),
  ('Wireless Headphones', 'Bluetooth over-ear headphones with noise cancellation.', 89.99, 50, 2, '/assets/img/produits/masque.png', 'N/A', 'N/A', 3, 'N/A'),
  ('Bluetooth Speaker', 'Portable Bluetooth speaker with high-quality sound.', 49.99, 20, 2, '/assets/img/produits/pagne.png', 'N/A', 'N/A', 3, 'N/A'),
  ('Smartphone Case', 'Durable case for iPhone and Samsung smartphones.', 15.99, 150, 3, '/assets/img/produits/sculpture.png', 'N/A', 'N/A', 3, 'N/A'),
  ('Laptop Stand', 'Adjustable laptop stand for ergonomic use.', 39.99, 75, 4, '/assets/img/produits/poteries.png', 'N/A', 'N/A', 3, 'N/A');


-- Authors
CREATE TABLE IF NOT EXISTS authors (
  id SERIAL PRIMARY KEY,
  user_id INT NOT NULL UNIQUE,
  bio TEXT,
  website VARCHAR(255),
  social_media_links JSONB DEFAULT '[]',
  key_words TEXT[],
  is_verified BOOLEAN DEFAULT FALSE,
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  photo_url VARCHAR(255) DEFAULT '',
  FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE CASCADE
);


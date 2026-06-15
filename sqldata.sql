-- =========================================
-- 🏪 SUPERMARKETS
-- =========================================

INSERT INTO supermarkets (name, logo_url)
VALUES
('Jumbo', NULL),
('Albert Heijn', NULL),
('PLUS', NULL);


-- =========================================
-- 🛒 PRODUCTS
-- =========================================

INSERT INTO products (barcode, name, brand, image_url)
VALUES
('8712423012345', 'Coca-Cola Zero 1.5L', 'Coca-Cola', NULL),
('8712423022222', 'Raffaello 230g', 'Ferrero', NULL),
('8712423033333', 'AH Halfvolle Melk 1L', 'Albert Heijn', NULL),
('8712423044444', 'Jumbo Pindakaas 350g', 'Jumbo', NULL),
('8712423055555', 'PLUS Volkoren Brood', 'PLUS', NULL),
('8712423066666', 'Douwe Egberts Roodmerk 500g', 'Douwe Egberts', NULL),
('8712423077777', 'Nutella 400g', 'Ferrero', NULL),
('8712423088888', 'Lays Naturel Chips 200g', 'Lays', NULL);


-- =========================================
-- 💰 PRODUCT PRICES
-- =========================================
-- Let op: product_id en supermarket_id gaan uit van AUTO_INCREMENT volgorde

INSERT INTO product_prices (product_id, supermarket_id, price)
VALUES
-- Coca-Cola Zero
(1, 1, 2.49),
(1, 2, 2.69),
(1, 3, 2.59),

-- Raffaello
(2, 1, 5.49),
(2, 2, 5.79),
(2, 3, 5.59),

-- AH Melk
(3, 2, 1.09),

-- Jumbo Pindakaas
(4, 1, 2.19),

-- PLUS brood
(5, 3, 1.99),

-- Douwe Egberts
(6, 1, 6.99),
(6, 2, 7.29),
(6, 3, 6.89),

-- Nutella
(7, 1, 4.29),
(7, 2, 4.49),
(7, 3, 4.39),

-- Lays chips
(8, 1, 1.89),
(8, 2, 1.99),
(8, 3, 1.95);
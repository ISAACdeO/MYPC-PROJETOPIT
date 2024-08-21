
USE MYPC_DB;



CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL
);


INSERT INTO processadores (nome, socket, memoria_max, preco) VALUES
('Intel Core i5-10400', 'LGA 1200', 128, 899.99);

ALTER TABLE processadores
ADD COLUMN link_loja VARCHAR(255) NULL;
    
ALTER TABLE processadores
ADD COLUMN descricao TEXT NULL;

ALTER TABLE processadores
ADD COLUMN imagem VARCHAR(255) NULL;

-- Atualização da tabela placas_mae
ALTER TABLE processadores
ADD COLUMN preco DECIMAL(10, 2) NOT NULL DEFAULT 0.00;

ALTER TABLE processadores
ADD COLUMN descricao_detalhada TEXT;

-- Adiciona a coluna descricao_detalhada à tabela placas_mae
ALTER TABLE placas_mae
ADD COLUMN descricao_detalhada TEXT;
-- Adiciona a coluna preco à tabela placas_mae
ALTER TABLE placas_mae
ADD COLUMN preco DECIMAL(10, 2) NOT NULL DEFAULT 0.00;

ALTER TABLE placas_mae
ADD COLUMN imagem VARCHAR(255) NULL;

-- Seção de Compatibilidade
drop table processadores;
CREATE TABLE processadores (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(255) NOT NULL,
    socket VARCHAR(50) NOT NULL,
    memoria_max INT NOT NULL,
    preco DECIMAL(10, 2) NOT NULL
);


drop table placas_mae;
CREATE TABLE placas_mae (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(255) NOT NULL,
    socket VARCHAR(50) NOT NULL,
    memoria_max INT NOT NULL,
    preco DECIMAL(10, 2) NOT NULL
);

drop table memoria_ram;
CREATE TABLE memoria_ram (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(255) NOT NULL,
    descricao VARCHAR(500) NOT NULL,
    descricao_detalhada VARCHAR(500) NOT NULL,
    qualidade VARCHAR(50) NOT NULL,
    imagem VARCHAR(300) NOT NULL,
    preco DECIMAL(10, 2) NOT NULL,
    tipo_memoria VARCHAR(50) NOT NULL,     -- DDR4, DDR5, etc.
    capacidade INT NOT NULL,               -- Capacidade em GB
    velocidade INT NOT NULL ,
    link_loja VARCHAR(500) NULL-- Velocidade em MHz
);

ALTER TABLE placas_video
ADD COLUMN link_loja VARCHAR(255) NULL;
ALTER TABLE processadores
ADD COLUMN imagem VARCHAR(255) AFTER memoria_max;
ALTER TABLE memoria_ram
ADD COLUMN link_loja VARCHAR(255) NULL;
ALTER TABLE placas_mae
ADD COLUMN imagem VARCHAR(255) AFTER memoria_max;
ALTER TABLE fonte
ADD COLUMN link_loja VARCHAR(255) NULL;
-- Inserção de teste para a tabela memoria_ram
INSERT INTO memoria_ram (nome, descricao, descricao_detalhada, qualidade, imagem, preco, tipo_memoria, capacidade, velocidade) VALUES
('Corsair Vengeance LPX 16GB', 'Memória RAM DDR4 de 16GB', 'Corsair Vengeance LPX, DDR4, 16GB, 3200MHz', 'Alta', 'corsair_vengeance_lpx.jpg', 299.99, 'DDR4', 16, 3200),
('Kingston HyperX Fury 8GB', 'Memória RAM DDR4 de 8GB', 'Kingston HyperX Fury, DDR4, 8GB, 2666MHz', 'Boa', 'kingston_hyperx_fury.jpg', 149.99, 'DDR4', 8, 2666);


CREATE TABLE fonte (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(255) NOT NULL,
    descricao VARCHAR(500) NOT NULL,
    descricao_detalhada VARCHAR(500) NOT NULL,
    qualidade VARCHAR(50) NOT NULL,
    imagem VARCHAR(300) NOT NULL,
    preco DECIMAL(10, 2) NOT NULL,
    potencia INT NOT NULL,                -- Potência em Watts
    certificacao VARCHAR(50) NOT NULL,    -- Certificação, por exemplo, 80 Plus Gold
    modularidade VARCHAR(50) NOT NULL,
    link_loja VARCHAR(500) NULL-- Modular, Semi-Modular, Não-Modular
);

INSERT INTO fonte (nome, descricao, descricao_detalhada, qualidade, imagem, preco, potencia, certificacao, modularidade) 
VALUES 
('Corsair RM850e', 'Fonte 850W 80 Plus Gold', 'Corsair RM850x, 850W, Certificação 80 Plus Gold, Modular', 'Excelente', 'https://acesse.one/FZqw9', 499.99, 850, '80 Plus Gold', 'Modular');

-- Inserção de teste para a tabela fonte
INSERT INTO fonte (nome, descricao, descricao_detalhada, qualidade, imagem, preco, potencia, certificacao, modularidade) VALUES
('Corsair RM850x', 'Fonte 850W 80 Plus Gold', 'Corsair RM850x, 850W, Certificação 80 Plus Gold, Modular', 'Excelente', 'corsair_rm850x.jpg', 499.99, 850, '80 Plus Gold', 'Modular'),
('EVGA 600 W1', 'Fonte 600W 80 Plus White', 'EVGA 600 W1, 600W, Certificação 80 Plus White, Não-Modular', 'Boa', 'evga_600_w1.jpg', 229.99, 600, '80 Plus White', 'Não-Modular');
-- Inserção de teste para a tabela fonte
INSERT INTO fonte (nome, descricao, descricao_detalhada, qualidade, imagem, preco, potencia, certificacao, modularidade, link_loja) VALUES
('MSI MAG A650BN', 'Fonte 650W 80 Plus Bronze', 'MSI MAG A650BN, 650W, 80 Plus Bronze, PFC Ativo, Com Cabo, Preto.', 'Boa', 'https://www.kabum.com.br/_next/image?url=https%3A%2F%2Fimages.kabum.com.br%2Fprodutos%2Ffotos%2F369658%2Ffonte-msi-mag-a650bn-atx-650w-80-plus-bronze-pfc-ativo-entrada-bivolt-preto-306-7zp2b22-ce0_1665770996_g.jpg&w=640&q=100', 279.99, 650, '80 Plus Bronze', 'Não-Modular', 'https://l1nk.dev/IXDj9');

INSERT INTO memoria_ram (nome, descricao, descricao_detalhada, qualidade, imagem, preco, tipo_memoria, capacidade, velocidade, link_loja) VALUES
('Corsair Vengeance LPX 16GB', 'Memória RAM DDR4 de 16GB', 'Corsair Vengeance LPX, DDR4, 16GB, 3200MHz', 'Alta', 'corsair_vengeance_lpx.jpg', 299.99, 'DDR4', 16, 3200, 'https://www.exemplo.com/produto/corsair-vengeance-lpx-16gb'),
('Kingston HyperX Fury 8GB', 'Memória RAM DDR4 de 8GB', 'Kingston HyperX Fury, DDR4, 8GB, 2666MHz', 'Boa', 'kingston_hyperx_fury.jpg', 149.99, 'DDR4', 8, 2666, 'https://www.exemplo.com/produto/kingston-hyperx-fury-8gb');
INSERT INTO memoria_ram (nome, descricao, descricao_detalhada, qualidade, imagem, preco, tipo_memoria, capacidade, velocidade, link_loja) VALUES
('Corsair Vengeance RGB Pro 16GB (2x8GB)', 'Memória RAM DDR4 de 16GB (2x8GB), 3600MHz', 'Corsair Vengeance RGB Pro, 16GB (2x8GB), 3600MHz, DDR4, CL18, Preto.', 'Excelente', 'https://www.kabum.com.br/_next/image?url=https%3A%2F%2Fimages.kabum.com.br%2Fprodutos%2Ffotos%2F108450%2Fmemoria-corsair-vengeance-rgb-pro-16gb-2x8gb-3600mhz-ddr4-cl18-cmw16gx4m2z3600c18_1575379797_g.jpg&w=640&q=100', 388.99, 'DDR4', 16, 3600, 'https://l1nk.dev/1kZl5');


INSERT INTO fonte (nome, descricao, descricao_detalhada, qualidade, imagem, preco, potencia, certificacao, modularidade, link_loja) VALUES
('Corsair RM850x', 'Fonte 850W 80 Plus Gold', 'Corsair RM850x, 850W, Certificação 80 Plus Gold, Modular', 'Excelente', 'corsair_rm850x.jpg', 499.99, 850, '80 Plus Gold', 'Modular', 'https://www.exemplo.com/produto/corsair-rm850x'),
('EVGA 600 W1', 'Fonte 600W 80 Plus White', 'EVGA 600 W1, 600W, Certificação 80 Plus White, Não-Modular', 'Boa', 'evga_600_w1.jpg', 229.99, 600, '80 Plus White', 'Não-Modular', 'https://www.exemplo.com/produto/evga-600-w1');



-- Inserção de teste para a tabela placas_video
INSERT INTO placas_video (nome, descricao, descricao_detalhada, qualidade, imagem, preco, link_loja) VALUES
('RTX 4060 VENTUS 2x Black OC MSI', 'Placa de Vídeo RTX 4060 VENTUS 2x Black OC', 'MSI NVIDIA GeForce, 8GB GDDR6, DLSS, Ray Tracing.', 'Excelente', 'https://www.kabum.com.br/_next/image?url=https%3A%2F%2Fimages.kabum.com.br%2Fprodutos%2Ffotos%2F469132%2Fplaca-de-video-rtx-4060-ventus-2x-black-oc-msi-nvidia-geforce-8gb-gddr6-dlss-ray-tracing_1688052210_g.jpg&w=640&q=100', 1989.99, 'https://l1nk.dev/DFVpt');





drop table compatibilidade;
CREATE TABLE compatibilidade (
    id INT AUTO_INCREMENT PRIMARY KEY,
    processador_id INT NOT NULL,
    placa_mae_id INT NOT NULL,
    FOREIGN KEY (processador_id) REFERENCES processadores(id),
    FOREIGN KEY (placa_mae_id) REFERENCES placas_mae(id)
);


INSERT INTO processadores (nome, socket, memoria_max) VALUES
('Intel Core i5-10400', 'LGA 1200', 128),
('Intel Core i7-10700K', 'LGA 1200', 128),
('AMD Ryzen 5 3600', 'AM4', 128),
('AMD Ryzen 7 5800X', 'AM4', 128),
('Intel Core i9-10900K', 'LGA 1200', 128),
('Intel Core i3-10100', 'LGA 1200', 128),
('AMD Ryzen 9 3900X', 'AM4', 128),
('AMD Ryzen 5 5600X', 'AM4', 128),
('Intel Core i5-10600K', 'LGA 1200', 128),
('Intel Core i7-11700K', 'LGA 1200', 128),
('AMD Ryzen 9 5950X', 'AM4', 128),
('AMD Ryzen 7 3700X', 'AM4', 128),
('Intel Core i3-10300', 'LGA 1200', 128),
('Intel Core i9-11900K', 'LGA 1200', 128),
('AMD Ryzen 5 3500X', 'AM4', 128),
('AMD Ryzen 7 2700X', 'AM4', 128),
('Intel Core i5-11400F', 'LGA 1200', 128),
('Intel Core i7-12700K', 'LGA 1700', 128),
('AMD Ryzen 9 3950X', 'AM4', 128),
('AMD Ryzen 5 3400G', 'AM4', 128),
('Intel Core i3-10105F', 'LGA 1200', 128),
('Intel Core i9-12900K', 'LGA 1700', 128),
('AMD Ryzen 7 3800X', 'AM4', 128),
('AMD Ryzen 5 2600', 'AM4', 128),
('Intel Core i5-10400F', 'LGA 1200', 128),
('Intel Core i7-10700', 'LGA 1200', 128),
('AMD Ryzen 9 5900X', 'AM4', 128),
('AMD Ryzen 3 3100', 'AM4', 128),
('Intel Core i3-10100F', 'LGA 1200', 128),
('Intel Core i9-10850K', 'LGA 1200', 128),
('AMD Ryzen 5 2600X', 'AM4', 128),
('AMD Ryzen 7 5700G', 'AM4', 128),
('Intel Core i5-11600K', 'LGA 1200', 128),
('Intel Core i7-11700F', 'LGA 1200', 128),
('AMD Ryzen 9 5900', 'AM4', 128),
('AMD Ryzen 5 2400G', 'AM4', 128),
('Intel Core i3-10105', 'LGA 1200', 128),
('Intel Core i9-11900', 'LGA 1200', 128),
('AMD Ryzen 3 3200G', 'AM4', 128),
('AMD Ryzen 7 2700', 'AM4', 128),
('Intel Core i5-10500', 'LGA 1200', 128),
('Intel Core i7-12700', 'LGA 1700', 128),
('AMD Ryzen 9 5950', 'AM4', 128),
('AMD Ryzen 5 1600', 'AM4', 128),
('Intel Core i3-10320', 'LGA 1200', 128);


INSERT INTO placas_mae (nome, socket, memoria_max) VALUES
('ASUS TUF Gaming B460M-PLUS', 'LGA 1200', 128),
('MSI MAG B550M MORTAR', 'AM4', 128),
('Gigabyte B550 AORUS ELITE', 'AM4', 128),
('ASRock Z490 Taichi', 'LGA 1200', 128),
('ASUS ROG Strix B550-F Gaming', 'AM4', 128),
('MSI MPG Z490 Gaming Edge WiFi', 'LGA 1200', 128),
('Gigabyte Z490 AORUS ULTRA', 'LGA 1200', 128),
('ASRock B450 Steel Legend', 'AM4', 128),
('ASUS Prime Z490-A', 'LGA 1200', 128),
('MSI B450 TOMAHAWK MAX', 'AM4', 128),
('Gigabyte B450M DS3H', 'AM4', 128),
('ASRock B550 Phantom Gaming 4', 'AM4', 128),
('ASUS ROG Crosshair VIII Hero', 'AM4', 128),
('MSI MAG Z490 TOMAHAWK', 'LGA 1200', 128),
('Gigabyte Z490 Vision G', 'LGA 1200', 128),
('ASRock B550 Pro4', 'AM4', 128),
('ASUS TUF Gaming X570-Plus', 'AM4', 128),
('MSI MPG B550 Gaming Plus', 'AM4', 128),
('Gigabyte X570 AORUS ELITE', 'AM4', 128),
('ASRock Z490 Extreme4', 'LGA 1200', 128),
('ASUS Prime B450M-A', 'AM4', 128),
('MSI Z490-A PRO', 'LGA 1200', 128),
('Gigabyte B450 AORUS M', 'AM4', 128),
('ASRock X570 Phantom Gaming 4', 'AM4', 128),
('ASUS ROG Strix Z490-E Gaming', 'LGA 1200', 128),
('MSI B550M PRO-VDH WiFi', 'AM4', 128),
('Gigabyte Z490 Gaming X', 'LGA 1200', 128),
('ASRock B450M Pro4', 'AM4', 128),
('ASUS Prime B550M-A', 'AM4', 128),
('MSI MAG B460M Bazooka', 'LGA 1200', 128),
('Gigabyte B450M H', 'AM4', 128),
('ASRock X570 Steel Legend', 'AM4', 128),
('ASUS ROG Strix Z490-F Gaming', 'LGA 1200', 128),
('MSI MPG B550 Gaming Edge WiFi', 'AM4', 128),
('Gigabyte Z490 AORUS Master', 'LGA 1200', 128),
('ASRock B450M Steel Legend', 'AM4', 128),
('ASUS TUF Gaming B550-PLUS', 'AM4', 128),
('MSI Z490 Gaming Carbon WiFi', 'LGA 1200', 128),
('Gigabyte B550M AORUS PRO-P', 'AM4', 128);
INSERT INTO placas_mae (nome, socket, memoria_max, preco) VALUES
('MSI Z490 Gaming Carbon WiFi', 'LGA 1200', 128, 899.99);
INSERT INTO processadores (nome, socket, memoria_max, preco, descricao_detalhada) VALUES
('Intel Core i5-10400', 'LGA 1200', 128, 180.00, 'Processador de 6 núcleos e 12 threads, ideal para tarefas do dia a dia e jogos leves.'),
('Intel Core i7-10700K', 'LGA 1200', 128, 320.00, 'Processador de 8 núcleos e 16 threads, excelente para jogos e aplicações intensivas.'),
('AMD Ryzen 5 3600', 'AM4', 128, 200.00, 'Processador de 6 núcleos e 12 threads, conhecido por seu desempenho sólido em jogos e multitarefa.'),
('AMD Ryzen 7 5800X', 'AM4', 128, 450.00, 'Processador de 8 núcleos e 16 threads, muito eficiente para tarefas de alta performance e jogos.'),
('Intel Core i9-10900K', 'LGA 1200', 128, 500.00, 'Processador de 10 núcleos e 20 threads, ideal para entusiastas e trabalhos pesados.'),
-- Adicione o restante dos processadores da mesma forma
;

-- Assegurando que as placas-mãe existam antes de inserir compatibilidades
INSERT INTO compatibilidade (processador_id, placa_mae_id) VALUES
 (1, 1),  -- Intel Core i5-10400 e ASUS TUF Gaming B460M-PLUS
 (2, 1),  -- Intel Core i7-10700K e ASUS TUF Gaming B460M-PLUS
 (3, 2),  -- AMD Ryzen 5 3600 e MSI MAG B550M MORTAR
 (4, 3),  -- AMD Ryzen 7 5800X e Gigabyte B550 AORUS ELITE
 (1, 2),  -- Intel Core i5-10400 e MSI MAG B550M MORTAR
 (2, 3),  -- Intel Core i7-10700K e Gigabyte B550 AORUS ELITE
 (3, 4),  -- AMD Ryzen 5 3600 e ASRock Z490 Taichi
 (4, 5),  -- AMD Ryzen 7 5800X e ASUS ROG Strix B550-F Gaming
 (5, 6),  -- Intel Core i9-10900K e MSI MPG Z490 Gaming Edge WiFi
 (6, 7),  -- Intel Core i3-10100 e Gigabyte Z490 AORUS ULTRA
 (7, 8),  -- AMD Ryzen 9 3900X e ASRock B450 Steel Legend
 (8, 9),  -- AMD Ryzen 5 5600X e ASUS Prime Z490-A
 (9, 10), -- Intel Core i5-10600K e MSI B450 TOMAHAWK MAX
 (10, 11),-- Intel Core i7-11700K e Gigabyte B450M DS3H
 (11, 12),-- AMD Ryzen 9 5950X e ASRock B550 Phantom Gaming 4
 (12, 13),-- AMD Ryzen 7 3700X e ASUS ROG Crosshair VIII Hero
 (13, 14),-- Intel Core i3-10300 e MSI MAG Z490 TOMAHAWK
 (14, 15),-- Intel Core i9-11900K e Gigabyte Z490 Vision G
 (15, 16),-- AMD Ryzen 5 3500X e ASRock B550 Pro4
 (16, 17),-- AMD Ryzen 7 2700X e ASUS TUF Gaming X570-Plus
 (17, 18),-- Intel Core i5-11400F e MSI MPG B550 Gaming Plus
 (18, 19),-- Intel Core i7-12700K e Gigabyte X570 AORUS ELITE
 (19, 20),-- AMD Ryzen 9 3950X e ASRock Z490 Extreme4
 (20, 21),-- AMD Ryzen 5 3400G e ASUS Prime B450M-A
 (21, 22),-- Intel Core i3-10105F e MSI Z490-A PRO
 (22, 23),-- Intel Core i9-12900K e Gigabyte B450 AORUS M
 (23, 24),-- AMD Ryzen 7 3800X e ASRock X570 Phantom Gaming 4
 (24, 25),-- AMD Ryzen 5 2600 e ASUS ROG Strix Z490-E Gaming
 (25, 26),-- Intel Core i5-10400F e MSI B550M PRO-VDH WiFi
 (26, 27),-- Intel Core i7-10700 e Gigabyte Z490 Gaming X
 (27, 28),-- AMD Ryzen 9 5900X e ASRock B450M Pro4
 (28, 29),-- AMD Ryzen 3 3100 e ASUS Prime B550M-A
 (29, 30),-- Intel Core i3-10100F e MSI MAG B460M Bazooka
 (30, 31),-- Intel Core i9-10850K e Gigabyte B450M H
 (31, 32),-- AMD Ryzen 5 2600X e ASRock X570 Steel Legend
 (32, 33),-- AMD Ryzen 7 5700G e ASUS ROG Strix Z490-F Gaming
 (33, 34),-- Intel Core i5-11600K e MSI MPG B550 Gaming Edge WiFi
 (34, 35),-- Intel Core i7-11700F e Gigabyte Z490 AORUS Master
 (35, 36),-- AMD Ryzen 9 5900 e ASRock B450M Steel Legend
 (36, 37),-- AMD Ryzen 5 2400G e ASUS TUF Gaming B550-PLUS
 (37, 38),-- Intel Core i3-10105 e MSI Z490 Gaming Carbon WiFi
 (38, 39),-- Intel Core i9-11900 e Gigabyte B550M AORUS PRO-P
 (39, 40),-- AMD Ryzen 3 3200G e Gigabyte B450M DS3H
 (40, 41),-- AMD Ryzen 7 2700 e ASUS ROG Crosshair VIII Hero
 (41, 42),-- Intel Core i5-10500 e MSI Z490-A PRO
 (42, 43),-- Intel Core i7-12700 e Gigabyte B450 AORUS M
 (43, 44),-- AMD Ryzen 9 5950 e ASRock X570 Phantom Gaming 4
 (44, 45),-- AMD Ryzen 5 1600 e ASUS Prime B450M-A
 (45, 46);-- Intel Core i3-10320 e MSI B450 TOMAHAWK MAX




DROP TABLE IF EXISTS placas_video;
CREATE TABLE placas_video (
    id INT AUTO_INCREMENT PRIMARY KEY,
    link_descricao VARCHAR(255),
    nome VARCHAR(255) NOT NULL,
    descricao varchar(500) not null,
    descricao_detalhada varchar(500) not null,
    qualidade varchar(50) not null,
    imagem varchar(300) not null,
    preco DECIMAL(10 ,2) not null,
    chipset VARCHAR(50) NOT NULL
);

INSERT INTO placas_video (nome, descricao, descricao_detalhada, qualidade, imagem, preco, link_loja, link_descricao, chipset) VALUES
('RTX 4060 VENTUS 2x Black OC MSI', 'Placa de Vídeo RTX 4060 VENTUS 2x Black OC', 'MSI NVIDIA GeForce, 8GB GDDR6, DLSS, Ray Tracing.', 'Excelente', 'https://www.kabum.com.br/_next/image?url=https%3A%2F%2Fimages.kabum.com.br%2Fprodutos%2Ffotos%2F469132%2Fplaca-de-video-rtx-4060-ventus-2x-black-oc-msi-nvidia-geforce-8gb-gddr6-dlss-ray-tracing_1688052210_g.jpg&w=640&q=100', 1989.99, 'https://l1nk.dev/DFVpt', 'https://www.kabum.com.br/produto/469132/placa-de-video-rtx-4060-ventus-2x-black-oc-msi-nvidia-geforce-8gb-gddr6-dlss-ray-tracing', 'NVIDIA GeForce RTX 4060');

select * from placas_video;
INSERT INTO placas_video (link_descricao, nome, descricao, descricao_detalhada, qualidade, imagem, preco, chipset) VALUES
('https://meusite.com/descricao/nvidia-geforce-rtx-3080', 'NVIDIA GeForce RTX 3080', 'Placa de vídeo de altíssima performance para jogos e criação de conteúdo.', 'Placa de vídeo com arquitetura Ampere, oferecendo um desempenho incrível e recursos avançados para jogos e criação de conteúdo. Ideal para jogos em 4K e aplicativos exigentes.', 'Alta', 'https://example.com/rtx3080.jpg', 699.99, 'RTX 3080'),
('https://meusite.com/descricao/nvidia-geforce-rtx-3070', 'NVIDIA GeForce RTX 3070', 'Placa de vídeo com excelente custo-benefício para jogos em alta resolução.', 'Com arquitetura Ampere, esta placa oferece um desempenho excepcional para jogos em 1440p e 4K. Ideal para gamers que buscam alta performance sem gastar muito.', 'Alta', 'https://example.com/rtx3070.jpg', 499.99, 'RTX 3070'),
('https://meusite.com/descricao/amd-radeon-rx-6700-xt', 'AMD Radeon RX 6700 XT', 'Placa de vídeo para jogos em alta resolução com bom custo-benefício.', 'Equipada com arquitetura RDNA 2, esta placa oferece um ótimo desempenho para jogos em 1440p. Ideal para quem quer um bom desempenho em jogos sem pagar o preço das top de linha.', 'Alta', 'https://example.com/rx6700xt.jpg', 479.99, 'RX 6700 XT'),
('https://meusite.com/descricao/nvidia-geforce-rtx-3060-ti', 'NVIDIA GeForce RTX 3060 Ti', 'Placa de vídeo de médio-alto desempenho para jogos e criação de conteúdo.', 'Placa com arquitetura Ampere, excelente para jogos em 1080p e 1440p com alto desempenho. Ideal para criadores de conteúdo e gamers que querem um bom desempenho sem gastar muito.', 'Alta', 'https://example.com/rtx3060ti.jpg', 399.99, 'RTX 3060 Ti'),
('https://meusite.com/descricao/amd-radeon-rx-6600-xt', 'AMD Radeon RX 6600 XT', 'Placa de vídeo com bom desempenho para jogos em 1080p.', 'Com arquitetura RDNA 2, esta placa oferece um desempenho sólido para jogos em 1080p. Ideal para gamers que buscam uma boa performance em Full HD.', 'Alta', 'https://example.com/rx6600xt.jpg', 379.99, 'RX 6600 XT'),
('https://meusite.com/descricao/nvidia-geforce-rtx-3090', 'NVIDIA GeForce RTX 3090', 'Placa de vídeo de ultra performance para jogos e criação de conteúdo.', 'Placa com arquitetura Ampere, oferecendo desempenho incrível para jogos em 4K e 8K, bem como para criação de conteúdo pesado. Ideal para profissionais e gamers entusiastas.', 'Alta', 'https://example.com/rtx3090.jpg', 1499.99, 'RTX 3090'),
('https://meusite.com/descricao/amd-radeon-rx-6900-xt', 'AMD Radeon RX 6900 XT', 'Placa de vídeo de altíssima performance para jogos e aplicativos gráficos intensivos.', 'Com arquitetura RDNA 2, esta placa oferece um desempenho excepcional para jogos em 4K. Ideal para quem busca o melhor da AMD em termos de performance.', 'Alta', 'https://example.com/rx6900xt.jpg', 999.99, 'RX 6900 XT'),
('https://meusite.com/descricao/nvidia-geforce-rtx-3060', 'NVIDIA GeForce RTX 3060', 'Placa de vídeo de médio desempenho para jogos em 1080p.', 'Com arquitetura Ampere, esta placa oferece um bom desempenho para jogos em 1080p e algumas aplicações em 1440p. Ideal para gamers que buscam uma placa com bom custo-benefício.', 'Média', 'https://example.com/rtx3060.jpg', 329.99, 'RTX 3060'),
('https://meusite.com/descricao/amd-radeon-rx-6500-xt', 'AMD Radeon RX 6500 XT', 'Placa de vídeo de entrada para jogos em 1080p.', 'Com arquitetura RDNA 2, esta placa oferece um desempenho razoável para jogos em 1080p. Ideal para gamers que estão começando e querem uma boa performance em Full HD.', 'Média', 'https://example.com/rx6500xt.jpg', 199.99, 'RX 6500 XT'),
('https://meusite.com/descricao/nvidia-geforce-gtx-1660-super', 'NVIDIA GeForce GTX 1660 Super', 'Placa de vídeo de médio desempenho para jogos em 1080p.', 'Placa com arquitetura Turing, oferecendo um bom desempenho para jogos em 1080p com ótimo custo-benefício. Ideal para gamers que buscam um bom desempenho sem gastar muito.', 'Média', 'https://example.com/gtx1660super.jpg', 229.99, 'GTX 1660 Super'),
('https://meusite.com/descricao/amd-radeon-rx-5700-xt', 'AMD Radeon RX 5700 XT', 'Placa de vídeo de alta performance para jogos em 1440p.', 'Com arquitetura RDNA, esta placa oferece um ótimo desempenho para jogos em 1440p. Ideal para gamers que buscam um bom desempenho em resoluções mais altas.', 'Alta', 'https://example.com/rx5700xt.jpg', 399.99, 'RX 5700 XT'),
('https://meusite.com/descricao/nvidia-geforce-rtx-2080-ti', 'NVIDIA GeForce RTX 2080 Ti', 'Placa de vídeo de altíssima performance para jogos em 4K.', 'Placa com arquitetura Turing, oferecendo um desempenho incrível para jogos em 4K e criação de conteúdo. Ideal para gamers e criadores de conteúdo que buscam o melhor desempenho.', 'Alta', 'https://example.com/rtx2080ti.jpg', 1199.99, 'RTX 2080 Ti'),
('https://meusite.com/descricao/amd-radeon-rx-5600-xt', 'AMD Radeon RX 5600 XT', 'Placa de vídeo de médio-alto desempenho para jogos em 1080p.', 'Com arquitetura RDNA, esta placa oferece um ótimo desempenho para jogos em 1080p. Ideal para gamers que buscam uma boa performance em Full HD.', 'Alta', 'https://example.com/rx5600xt.jpg', 279.99, 'RX 5600 XT'),
('https://meusite.com/descricao/nvidia-geforce-rtx-2070-super', 'NVIDIA GeForce RTX 2070 Super', 'Placa de vídeo de alta performance para jogos em 1440p.', 'Placa com arquitetura Turing, oferecendo um desempenho sólido para jogos em 1440p e criação de conteúdo. Ideal para gamers e criadores de conteúdo que buscam um bom desempenho em resoluções mais altas.', 'Alta', 'https://example.com/rtx2070super.jpg', 499.99, 'RTX 2070 Super'),
('https://meusite.com/descricao/amd-radeon-rx-5500-xt', 'AMD Radeon RX 5500 XT', 'Placa de vídeo de entrada para jogos em 1080p.', 'Com arquitetura RDNA, esta placa oferece um bom desempenho para jogos em 1080p. Ideal para gamers que estão começando e querem uma boa performance em Full HD.', 'Média', 'https://example.com/rx5500xt.jpg', 169.99, 'RX 5500 XT'),
('https://meusite.com/descricao/nvidia-geforce-rtx-2060', 'NVIDIA GeForce RTX 2060', 'Placa de vídeo de médio desempenho para jogos em 1080p.', 'Placa com arquitetura Turing, oferecendo um bom desempenho para jogos em 1080p e algumas aplicações em 1440p. Ideal para gamers que buscam uma boa performance sem gastar muito.', 'Média', 'https://example.com/rtx2060.jpg', 299.99, 'RTX 2060'),
('https://meusite.com/descricao/amd-radeon-rx-570', 'AMD Radeon RX 570', 'Placa de vídeo de entrada para jogos em 1080p.', 'Com arquitetura Polaris, esta placa oferece um bom desempenho para jogos em 1080p. Ideal para gamers que buscam uma boa performance em Full HD com ótimo custo-benefício.', 'Média', 'https://example.com/rx570.jpg', 149.99, 'RX 570');


DROP TABLE IF EXISTS compatibilidade_video;
CREATE TABLE compatibilidade_video (
    id INT AUTO_INCREMENT PRIMARY KEY,
    processador_id INT NOT NULL,
    placa_video_id INT NOT NULL,
    FOREIGN KEY (processador_id) REFERENCES processadores(id),
    FOREIGN KEY (placa_video_id) REFERENCES placas_video(id)
);


drop table placas_video;


-- Intel Core i9-10900K e NVIDIA GeForce RTX 3080
    
    
    INSERT INTO compatibilidade_video (processador_id, placa_video_id) VALUES 
(5, 6), -- Intel Core i9-10900K com NVIDIA GeForce RTX 3090
(11, 7), -- AMD Ryzen 9 5950X com AMD Radeon RX 6900 XT
(18, 1), -- Intel Core i7-12700K com NVIDIA GeForce RTX 3080

(2, 2), -- Intel Core i7-10700K com NVIDIA GeForce RTX 3070
(4, 3), -- AMD Ryzen 7 5800X com AMD Radeon RX 6700 XT
(33, 4), -- Intel Core i5-11600K com NVIDIA GeForce RTX 3060 Ti

(1, 8), -- Intel Core i5-10400 com NVIDIA GeForce RTX 3060
(3, 13), -- AMD Ryzen 5 3600 com AMD Radeon RX 5600 XT
(6, 10), -- Intel Core i3-10100 com NVIDIA GeForce GTX 1660 Super

(13, 17), -- Intel Core i3-10300 com AMD Radeon RX 570
(20, 10), -- AMD Ryzen 5 3400G com NVIDIA GeForce GTX 1660 Super
(17, 15); -- Intel Core i5-11400F com AMD Radeon RX 5500 XT
    select * from processadores;
    
    /*
    CREATE TABLE pecas (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(255) NOT NULL,
    tipo ENUM('CPU', 'Placa-mãe', 'RAM', 'GPU', 'Fonte') NOT NULL,
    preco DECIMAL(10, 2) NOT NULL,
    lojas_disponiveis TEXT NOT NULL
);

INSERT INTO pecas (nome, tipo, preco, lojas_disponiveis) VALUES
('Intel Core i7', 'CPU', 1500.00, 'Loja A, Loja B'),
('ASUS B450', 'Placa-mãe', 700.00, 'Loja C, Loja D'),
('Corsair 16GB', 'RAM', 300.00, 'Loja E, Loja F'),
('NVIDIA GTX 1660', 'GPU', 1200.00, 'Loja G, Loja H'),
('Corsair 750W', 'Fonte', 400.00, 'Loja I, Loja J');

INSERT INTO compatibilidade_cpu_placa_mae (cpu_id, motherboard_id) VALUES (1, 2);
INSERT INTO compatibilidade_placa_mae_ram (motherboard_id, ram_id) VALUES (2, 3);
INSERT INTO compatibilidade_placa_mae_video (motherboard_id, gpu_id) VALUES (2, 4);
INSERT INTO compatibilidade_fonte_placa_mae (motherboard_id, fonte_id) VALUES (2, 5);


CREATE TABLE compatibilidade_cpu_placa_mae (
    cpu_id INT,
    motherboard_id INT,
    PRIMARY KEY (cpu_id, motherboard_id),
    FOREIGN KEY (cpu_id) REFERENCES pecas(id),
    FOREIGN KEY (motherboard_id) REFERENCES pecas(id)
);


CREATE TABLE compatibilidade_placa_mae_ram (
    motherboard_id INT,
    ram_id INT,
    PRIMARY KEY (motherboard_id, ram_id),
    FOREIGN KEY (motherboard_id) REFERENCES pecas(id),
    FOREIGN KEY (ram_id) REFERENCES pecas(id)
);

CREATE TABLE compatibilidade_placa_mae_video (
    motherboard_id INT,
    gpu_id INT,
    PRIMARY KEY (motherboard_id, gpu_id),
    FOREIGN KEY (motherboard_id) REFERENCES pecas(id),
    FOREIGN KEY (gpu_id) REFERENCES pecas(id)
);

CREATE TABLE compatibilidade_fonte_placa_mae (
    motherboard_id INT,
    fonte_id INT,
    PRIMARY KEY (motherboard_id, fonte_id),
    FOREIGN KEY (motherboard_id) REFERENCES pecas(id),
    FOREIGN KEY (fonte_id) REFERENCES pecas(id)
);
    
*/  
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    /*Sessão Usuarios */
    
    create table usuarios(
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(220) not null,
    email VARCHAR(220) not null,
    usuario VARCHAR(220) not null,
    senha VARCHAR(220) not null
    );
    
    INSERT INTO usuarios ( nome , email , usuario , senha) 
    VALUES ('isaac' , 'isaac@gmail',' isaac@gmail' , '123');
    
    INSERT INTO usuarios ( nome , email , usuario , senha) 
    VALUES ('isaac' , 'isaac@gmail',' isaac@gmail' , '$2y$10$VVNnAjflHvYN8vPqH3q5AuxqEvYQ0KDMVAhjNjHguNEhQzlJZ2YdS');
    
    select * from usuarios;


-- seção para recomendações

create table Notebooks (
marca VARCHAR(50) not null,
descricao VARCHAR(500) not null,
preco VARCHAR(600) not null,
site VARCHAR(800) not null,
imagem VARCHAR(800) not null
);
   drop table Notebooks;
INSERT INTO Notebooks (marca, descricao , preco , site , imagem) 
VALUES 
('HP','Notebook HP G9 Intel Core i3 8GB RAM 256GB SSD 15,6” HD Windows 11' ,' 2.294,10','https://www.magazineluiza.com.br/notebook-hp-g9-intel-core-i3-8gb-ram-256gb-ssd-156-hd-windows-11/p/237612600/in/note/?&force=4&seller_id=magazineluiza&utm_source=bing&utm_medium=pla&partner_id=76175&msclkid=4c303a3b24ee1321c9175cb24892dda9','https://a-static.mlcdn.com.br/800x560/notebook-hp-g9-intel-core-i3-8gb-ram-256gb-ssd-156-hd-windows-11/magazineluiza/237612600/791a60c134ddb8267f7891de90ec6f46.jpg'),
('DeLL','Notebook Dell Inspiron 15 3000 Intel Core i3-1215U 8GB 256GB SSD Tela 15.6” Full HD Windows 11 i15-I120K-A10P','R$ 2.611,55','https://www.casasbahia.com.br/notebook-dell-inspiron-15-3000-intel-core-i3-1215u-8gb-256gb-ssd-tela-15-6-full-hd-windows-11-i15-i120k-a10p-55065263/p/55065263?utm_medium=cpc&utm_source=bing_ads&IdSku=55065263&idLojista=10037&gclid=d358d583cb1515345799b30ab9df2e63&gclsrc=3p.ds&&utm_campaign=pmax_bing_tudo&msclkid=d358d583cb1515345799b30ab9df2e63&gclid=d358d583cb1515345799b30ab9df2e63&gclsrc=3p.ds','https://imgs.casasbahia.com.br/55065263/1g.jpg');
INSERT INTO Notebooks (marca, descricao , preco , site , imagem) 
VALUES 
('Acer','Notebook Gamer Acer Nitro V15 Intel Core i5-13420H, 8GB RAM, GeForce RTX 3050, SSD 512GB, 15.6" FHD IPS 144Hz, Windows 11, Preto - ANV15-51-58AZ','R$ 4.499,99','https://www.kabum.com.br/produto/564916/notebook-gamer-acer-nitro-v15-intel-core-i5-13420h-8gb-ram-geforce-rtx-3050-ssd-512gb-15-6-fhd-ips-144hz-windows-11-preto-anv15-51-58az','https://images.kabum.com.br/produtos/fotos/564916/notebook-gamer-acer-nitro-v15-intel-core-i5-13420h-8gb-ram-geforce-rtx-3050-ssd-512gb-15-6-fhd-ips-144hz-windows-11-preto-anv15-51-58az_1715197002_gg.jpg');
select * FROM Notebooks;


create table Computador (
marca VARCHAR(50) not null,
descricao VARCHAR(500) not null,
preco VARCHAR(600) not null,
site VARCHAR(800) not null,
imagem VARCHAR(800) not null
);

INSERT INTO Computador (marca, descricao , preco , site , imagem) 
VALUES 
('Intel','Computador Fácil Intel Core I5 8gb Ssd 240gb' ,'R$701,05','https://produto.mercadolivre.com.br/MLB-2115423359-computador-facil-intel-core-i5-8gb-ssd-240gb-_JM?matt_tool=14213447&matt_word=&matt_source=bing&matt_campaign=MLB_ML_BING_AO_CE-ALL-ALL_X_PLA_ALLB_TXS_ALL&matt_campaign_id=382858295&matt_ad_group=CE&matt_match_type=e&matt_network=o&matt_device=c&matt_keyword=default&msclkid=8cde772378c11efd13ea11aa01c5e870&utm_source=bing&utm_medium=cpc&utm_campaign=MLB_ML_BING_AO_CE-ALL-ALL_X_PLA_ALLB_TXS_ALL&utm_term=4581596253419756&utm_content=CE','https://http2.mlstatic.com/D_NQ_NP_618017-MLB48577590588_122021-O.webp');

INSERT INTO Computador (marca, descricao , preco , site , imagem) 
VALUES 
('AMD' ,   'Computador Pichau, AMD Athlon 3000G, 16GB DDR4, SSD 480GB'    ,'R$ 1.399,98','https://www.pichau.com.br/computador-pichau-amd-athlon-3000g-16gb-ddr4-ssd-480gb-33721','https://media.pichau.com.br/media/catalog/product/cache/2f958555330323e505eba7ce930bdf27/t/a/targe-amd-sgpu-001_1.jpg');

INSERT INTO Computador (marca, descricao , preco , site , imagem) 
VALUES 
('AMD' ,   'Computador Pichau Home, AMD A6-7480, 8GB DDR3, SSD 120GB'    ,'R$ 550,17','https://www.pichau.com.br/computador-pichau-home-amd-a6-7480-8gb-ddr3-ssd-120gb-18860', 'https://media.pichau.com.br/media/catalog/product/cache/2f958555330323e505eba7ce930bdf27/q/2/q2503_1_3_29.jpg');

INSERT INTO Computador (marca, descricao , preco , site , imagem) 
VALUES 
('AMD' ,   'Computador Pichau Home HM110, AMD A6-7480, 8GB DDR3, HD 1TB'    ,'R$ 642,71','https://www.pichau.com.br/computador-pichau-home-hm110-amd-a6-7480-8gb-ddr3-hd-1tb-31125', 'https://media.pichau.com.br/media/catalog/product/cache/2f958555330323e505eba7ce930bdf27/t/g/tgt_b110_-_01_30_9.jpg');

INSERT INTO Computador (marca, descricao , preco , site , imagem) 
VALUES 
('AMD' ,   'Computador Pichau Draconis, AMD Athlon 3000G, 8GB DDR4, SSD 240GB'    ,'R$ 1.129,98','https://www.pichau.com.br/computador-pichau-draconis-amd-athlon-3000g-8gb-ddr4-ssd-240gb-48919', 'https://media.pichau.com.br/media/catalog/product/cache/2f958555330323e505eba7ce930bdf27/g/a/gabinete-gamer-mancer-hexer-sgpu-001_2_1.jpg');



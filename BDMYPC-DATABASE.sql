
USE MYPC_DB;



CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL
);





-- Seção de Compatibilidade
drop table processadores;
CREATE TABLE processadores (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(255) NOT NULL,
    socket VARCHAR(50) NOT NULL,
    memoria_max INT NOT NULL
);


drop table placas_mae;
CREATE TABLE placas_mae (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(255) NOT NULL,
    socket VARCHAR(50) NOT NULL,
    memoria_max INT NOT NULL
);



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


INSERT INTO compatibilidade_video (processador_id, placa_video_id) VALUES (1, 2);  -- Intel Core i5-10400 e NVIDIA GeForce RTX 3070
INSERT INTO compatibilidade_video (processador_id, placa_video_id) VALUES (2, 1);  -- Intel Core i7-10700K e NVIDIA GeForce RTX 3080
INSERT INTO compatibilidade_video (processador_id, placa_video_id) VALUES (3, 1);  -- AMD Ryzen 5 3600 e NVIDIA GeForce RTX 3080
INSERT INTO compatibilidade_video (processador_id, placa_video_id) VALUES (4, 1);  -- AMD Ryzen 7 5800X e NVIDIA GeForce RTX 3080
INSERT INTO compatibilidade_video (processador_id, placa_video_id) VALUES (5, 1);  -- Intel Core i9-10900K e NVIDIA GeForce RTX 3080
    
    
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



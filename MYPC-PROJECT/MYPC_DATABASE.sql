CREATE DATABASE MYPC_DB;
USE MYPC_DB;

create database MYPC_PIT;
use MYPC_PIT;

CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL
);


    
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



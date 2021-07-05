CREATE TABLE IF NOT EXISTS moradia(
        id_moradia SERIAL CONSTRAINT pk_id_moradia PRIMARY KEY,
        moradia VARCHAR(11) NOT NULL,
        lang CHAR(5)
);

INSERT INTO moradia VALUES(DEFAULT, 'Casa', 'pt_BR'),(DEFAULT, 'Apartamento', 'pt_BR'),(DEFAULT, 'House', 'en_US'),(DEFAULT, 'Apartament', 'en_US');

CREATE TABLE IF NOT EXISTS horasSozinho(
        id_horasSozinho SERIAL CONSTRAINT pk_horasSozinho PRIMARY KEY,
        horasSozinho VARCHAR(30) NOT NULL, 
        lang CHAR(5) 
);

INSERT INTO horasSozinho VALUES (DEFAULT, 'Nem uma hora', 'pt_BR'),(DEFAULT, 'De 1 a 3 horas', 'pt_BR'),(DEFAULT, 'De 4 a 6 horas', 'pt_BR'),(DEFAULT, 'Mais de 6 horas', 'pt_BR'),(DEFAULT, 'Not even an hour', 'en_US'),(DEFAULT, 'From 1 to 3 hours', 'en_US'),(DEFAULT, 'From 4 to 6 hours', 'en_US'),(DEFAULT, 'More than 6 hours', 'en_US');

    CREATE TABLE IF NOT EXISTS genero(
        id_genero SERIAL CONSTRAINT pk_genero PRIMARY KEY,
        genero VARCHAR(10) NOT NULL,
        lang CHAR(5)
);

INSERT INTO genero VALUES (DEFAULT, 'Masculino', 'pt_BR'),(DEFAULT, 'Feminino', 'pt_BR'),(DEFAULT, 'Male', 'en_US'),(DEFAULT, 'Female', 'en_US');

CREATE TABLE IF NOT EXISTS especie(
        id_especies SERIAL CONSTRAINT pk_especie  PRIMARY KEY,
        especie VARCHAR(8) NOT NULL,  
        lang CHAR(5)        
);

INSERT INTO especie VALUES (DEFAULT, 'Cachorro', 'pt_BR'),(DEFAULT, 'Gato', 'pt_BR'),(DEFAULT, 'Dog', 'en_US'),(DEFAULT, 'Cat', 'en_US');

CREATE TABLE IF NOT EXISTS raca(
        id_raca SERIAL CONSTRAINT pk_raca PRIMARY KEY,
        raca VARCHAR(30) NOT NULL,  
        id_especies INTEGER,
        CONSTRAINT fk_especie FOREIGN KEY (id_especies) REFERENCES especie(id_especies),
        lang CHAR(5)
);

INSERT INTO raca VALUES (DEFAULT, 'Sem Raça Definida', 1),(DEFAULT, 'Akita', 1),(DEFAULT, 'American Staffordshire Terrier', 1),(DEFAULT, 'Basset Hound', 1),(DEFAULT, 'Beagle', 1),(DEFAULT, 'Bichon Frisé', 1),(DEFAULT, 'Border Collie', 1),(DEFAULT, 'Boston Terrier', 1),(DEFAULT, 'Boxer', 1),(DEFAULT, 'Buldogue Francês', 1),(DEFAULT, 'Buldogue Inglês', 1),(DEFAULT, 'Bull Terrier', 1),(DEFAULT, 'Cane Corso', 1),(DEFAULT, 'Cavalier Charles Spaniel', 1),(DEFAULT, 'Chihuahua', 1),(DEFAULT, 'Chow Chow', 1),(DEFAULT, 'Cocker Spaniel Inglês', 1),(DEFAULT, 'Dálmata', 1),(DEFAULT, 'Doberman', 1),(DEFAULT, 'Dogo Argentino', 1),(DEFAULT, 'Dogue Alemão', 1),(DEFAULT, 'Fila Brasileiro', 1),(DEFAULT, 'Golden Retriever', 1),(DEFAULT, 'Husky Siberiano', 1),(DEFAULT, 'Jack Russel Terrier', 1),(DEFAULT, 'Labrador Retriever', 1),(DEFAULT, 'Lhasa Apso', 1),(DEFAULT, 'Lulu da Pomerânia', 1),(DEFAULT, 'Maltês', 1),(DEFAULT, 'Mastiff Inglês', 1),(DEFAULT, 'Mastim Tiberiano', 1),(DEFAULT, 'Pastor Alemão', 1),(DEFAULT, 'Pastor Australiano', 1),(DEFAULT, 'Pastor de Shetland', 1),(DEFAULT, 'Pequinês', 1),(DEFAULT, 'Pinscher Miniatura', 1),(DEFAULT, 'Poodle', 1),(DEFAULT, 'Pug', 1),(DEFAULT, 'Rottweiler', 1),(DEFAULT, 'Schnauzer', 1),(DEFAULT, 'Shar-pei', 1),(DEFAULT, 'Shiba', 1),(DEFAULT, 'Shih Tzu', 1),(DEFAULT, 'Staffordshire Bull Terrier', 1),(DEFAULT, 'Weimaraner', 1),(DEFAULT, 'Whippet', 1),(DEFAULT, 'Yorkshire Terrier', 1),(DEFAULT, 'Sem Raça Definida', 2),(DEFAULT, 'Savannah', 2),(DEFAULT, 'Oriental Shorthair', 2),(DEFAULT, 'Oriental Longhair', 2),(DEFAULT, 'Somali', 2),(DEFAULT, 'Turkish Van', 2),(DEFAULT, 'Chausie', 2),(DEFAULT, 'Birmanês', 2),(DEFAULT, 'Chartreux', 2),(DEFAULT, 'Sagrado da Birmânia', 2),(DEFAULT, 'Sokoke', 2),(DEFAULT, 'Nebelung', 2),(DEFAULT, 'Selkirk Rex', 2),(DEFAULT, 'Cornish Rex', 2),(DEFAULT, 'Ocicat', 2),(DEFAULT, 'Peterbald', 2),(DEFAULT, 'Devon Rex', 2),(DEFAULT, 'Korat', 2),(DEFAULT, 'Selvagem', 2),(DEFAULT, 'Exótico de Pelo Curto', 2),(DEFAULT, 'Azul Russo', 2),(DEFAULT, 'Scottish Fold', 2),(DEFAULT, 'Snowshoe', 2),(DEFAULT, 'Manx', 2),(DEFAULT, 'Angorá Turco', 2),(DEFAULT, 'Bombaim', 2),(DEFAULT, 'Norueguês da Floresta', 2),(DEFAULT, 'Siberiano', 2),(DEFAULT, 'Bengal', 2),(DEFAULT, 'Siamês', 2),(DEFAULT, 'Ashera', 2),(DEFAULT, 'Maine Coon', 2),(DEFAULT, 'Lykoi ou Gato Lobo', 2),(DEFAULT, 'Muchkin', 2),(DEFAULT, 'Mau Egípicio', 2),(DEFAULT, 'Himalaio', 2),(DEFAULT, 'Havana', 2),(DEFAULT, 'Europeu', 2),(DEFAULT, 'Balinês', 2),(DEFAULT, 'Mist Australiano', 2),(DEFAULT, 'Abissíno', 2),(DEFAULT, 'Persa', 2),(DEFAULT, 'Ragdoll', 2),(DEFAULT, 'British Shorthair', 2);

CREATE TABLE IF NOT EXISTS porte(
        id_porte SERIAL CONSTRAINT pk_porte PRIMARY KEY,
        porte VARCHAR(9) NOT NULL,   
        lang CHAR(5)
);

INSERT INTO porte VALUES (DEFAULT, 'Miniatura', 'pt_BR'),(DEFAULT, 'Pequeno', 'pt_BR'),(DEFAULT, 'Médio', 'pt_BR'),(DEFAULT, 'Grande', 'pt_BR'),(DEFAULT, 'Miniature', 'en_US'),(DEFAULT, 'Small', 'en_US'),(DEFAULT, 'Medium', 'en_US'),(DEFAULT, 'Large', 'en_US');

CREATE TABLE IF NOT EXISTS statusAnimal(
    id_status SERIAL PRIMARY KEY,
    statusAnimal VARCHAR(30),
    lang CHAR(5)
);

INSERT INTO statusAnimal VALUES (DEFAULT, 'Disponível', 'pt_BR'),(DEFAULT, 'Em processo de adoção', 'pt_BR'),(DEFAULT, 'Adotado', 'pt_BR'),(DEFAULT, 'Available', 'en_US'),(DEFAULT, 'Applying for an adoption', 'en_US'),(DEFAULT, 'Adopted', 'en_US');

CREATE TABLE IF NOT EXISTS usuario(
        id_usuario SERIAL CONSTRAINT pk_usuario PRIMARY KEY,
        nome VARCHAR(80) NOT NULL,
        email VARCHAR(60) NOT NULL,  
        senha CHAR(60) NOT NULL,
        id_genero INTEGER,
        datanasci DATE,
        localizacao POINT,
        outrosAnimais INTEGER,
        criancas BOOLEAN,
        qtdMoradores SMALLINT,
        id_moradia INTEGER,
        id_horasSozinho INTEGER, 
        CONSTRAINT fk_genero FOREIGN KEY (id_genero) REFERENCES genero(id_genero),
        CONSTRAINT fk_moradia FOREIGN KEY (id_moradia) REFERENCES moradia(id_moradia),
        CONSTRAINT fk_horasSozinho FOREIGN KEY (id_horasSozinho) REFERENCES horasSozinho(id_horasSozinho)
);

CREATE TABLE IF NOT EXISTS animal(
        id_animal SERIAL CONSTRAINT pk_animal PRIMARY KEY,
        imagem VARCHAR(70) NOT NULL,
        nome VARCHAR(80) NOT NULL,
        id_genero INTEGER,
        datanasci DATE NOT NULL,
        id_raca INTEGER,
        id_porte INTEGER,
        castrado BOOLEAN NOT NULL,
        infoAdicional VARCHAR(255), 
        id_status INTEGER, 
        CONSTRAINT fk_raca FOREIGN KEY (id_raca) REFERENCES raca(id_raca),
        CONSTRAINT fk_genero FOREIGN KEY (id_genero) REFERENCES genero(id_genero),
        CONSTRAINT fk_porte FOREIGN KEY (id_porte) REFERENCES porte(id_porte),
        CONSTRAINT fk_status FOREIGN KEY (id_status) REFERENCES statusAnimal(id_status)  
);

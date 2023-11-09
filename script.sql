CREATE TABLE obras_de_arte (
  id INT NOT NULL AUTO_INCREMENT,
  titulo VARCHAR(255) NOT NULL,
  artista VARCHAR(255) NOT NULL,
  data_criacao DATE NOT NULL,
  material VARCHAR(255) NOT NULL,
  dimensoes VARCHAR(255) NOT NULL,
  url_image VARCHAR(500),
  PRIMARY KEY (id)
);

CREATE TABLE exposicoes (
  id INT NOT NULL AUTO_INCREMENT,
  titulo VARCHAR(255) NOT NULL,
  data_inicio DATE NOT NULL,
  data_fim DATE NOT NULL,
  local VARCHAR(255) NOT NULL,
  PRIMARY KEY (id)
);

CREATE TABLE obras_de_arte_em_exposicoes (
  obra_de_arte_id INT NOT NULL,
  exposicao_id INT NOT NULL,
  PRIMARY KEY (obra_de_arte_id, exposicao_id),
  FOREIGN KEY (obra_de_arte_id) REFERENCES obras_de_arte (id),
  FOREIGN KEY (exposicao_id) REFERENCES exposicoes (id)
);

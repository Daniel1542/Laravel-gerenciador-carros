CREATE TABLE "revisoes"(
    "id" BIGINT NOT NULL,
    "placa" VARCHAR(255) NOT NULL,
    "data" DATE NOT NULL,
    "descricao" VARCHAR(255) NOT NULL
);
ALTER TABLE
    "revisoes" ADD PRIMARY KEY("id");
ALTER TABLE
    "revisoes" ADD CONSTRAINT "revisoes_placa_unique" UNIQUE("placa");
CREATE TABLE "proprietarios"(
    "id" BIGINT NOT NULL,
    "nome" VARCHAR(255) NOT NULL,
    "cpf" INTEGER NOT NULL,
    "sexo" VARCHAR(255) NOT NULL,
    "email" VARCHAR(255) NULL,
    "telefone" VARCHAR(255) NOT NULL
);
ALTER TABLE
    "proprietarios" ADD PRIMARY KEY("id");
ALTER TABLE
    "proprietarios" ADD CONSTRAINT "proprietarios_cpf_unique" UNIQUE("cpf");
CREATE TABLE "veiculos"(
    "id" BIGINT NOT NULL,
    "cpf" INTEGER NOT NULL,
    "placa" VARCHAR(255) NOT NULL,
    "modelo" VARCHAR(255) NOT NULL,
    "marca" VARCHAR(255) NOT NULL
);
ALTER TABLE
    "veiculos" ADD PRIMARY KEY("id");
ALTER TABLE
    "veiculos" ADD CONSTRAINT "veiculos_cpf_unique" UNIQUE("cpf");
ALTER TABLE
    "veiculos" ADD CONSTRAINT "veiculos_placa_foreign" FOREIGN KEY("placa") REFERENCES "revisoes"("placa");
ALTER TABLE
    "proprietarios" ADD CONSTRAINT "proprietarios_cpf_foreign" FOREIGN KEY("cpf") REFERENCES "veiculos"("cpf");
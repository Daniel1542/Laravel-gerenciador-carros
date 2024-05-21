CREATE TABLE "revisoes"(
    "id" BIGINT NOT NULL,
    "id_revisao" BIGINT NOT NULL,
    "data" VARCHAR(255) NOT NULL,
    "tempo" INTEGER NOT NULL
);
ALTER TABLE
    "revisoes" ADD PRIMARY KEY("id");
CREATE TABLE "proprietarios"(
    "id" BIGINT NOT NULL,
    "id_proprietario" BIGINT NOT NULL,
    "nome" VARCHAR(255) NOT NULL,
    "cpf" VARCHAR(255) NOT NULL,
    "sexo" VARCHAR(255) NOT NULL,
    "email" VARCHAR(255) NULL,
    "telefone" INTEGER NOT NULL
);
ALTER TABLE
    "proprietarios" ADD PRIMARY KEY("id");
CREATE TABLE "veiculos"(
    "id" BIGINT NOT NULL,
    "id_veiculo" BIGINT NOT NULL,
    "modelo" VARCHAR(255) NOT NULL,
    "marca" VARCHAR(255) NOT NULL,
    "placa" VARCHAR(255) NOT NULL
);
ALTER TABLE
    "veiculos" ADD PRIMARY KEY("id");
ALTER TABLE
    "revisoes" ADD CONSTRAINT "revisoes_id_revisao_foreign" FOREIGN KEY("id_revisao") REFERENCES "veiculos"("id_veiculo");
ALTER TABLE
    "proprietarios" ADD CONSTRAINT "proprietarios_id_proprietario_foreign" FOREIGN KEY("id_proprietario") REFERENCES "veiculos"("id_veiculo");
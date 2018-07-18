--listando DADOS
select * from USUARIOS

-- cria sequence
create sequence SEQ_IDUSUARIO INCREMENT BY 1;

--inserindo dados
insert into USUARIOS (IDUSUARIO,NOME) values (SEQ_IDUSUARIO.nextval,'legal');


--Comitando
commit
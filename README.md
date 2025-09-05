# Primeiros passos

## Clone o repositório

```bash
git clone git@github.com:gabrielcaixeta/compartilha_web_security.git
cd compartilha_web_security
```

## Importe o banco

Entre no diretório `documentacao` e importe os scripts `script_db.sql` para criar a estrutura e `teste.sql` para importar usuários padrões do sistema.

```bash
cd documentacao
mysql -uroot -p < script_db.sql
mysql -uroot -p compartilha < teste.sql
```

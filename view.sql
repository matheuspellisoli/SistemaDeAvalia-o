create view usuarioinfo as
SELECT usuarios.idUsuario, usuarios.nome , usuarios.email , usuarios.senha,usuarios.nivelAcesso_idnivelAcesso as nivelAcesso , nivelacesso.descNivel,turma.id as idturma, turma.nome as turma , 
grupos.nome as grupo ,orientador.idUsuario as idorientador ,orientador.nome as nomeorientado
 FROM usuarios , nivelacesso ,usuarioturma,turma,grupos,usuariogrupos, usuarios as orientador
  where nivelacesso.idnivelAcesso = usuarios.nivelAcesso_idnivelAcesso 
  and usuarioturma.turma_idturma = turma.id  and usuarioturma.usuarios_idUsuario = usuarios.idUsuario 
  and usuariogrupos.Grupos_idGrupo = grupos.idGrupo and usuariogrupos.usuarios_idUsuario  =  usuarios.idUsuario 
  and orientador.idUsuario = turma.idOrientador
ORDER BY `usuarios`.nome

SELECT usuarios.idUsuario, usuarios.nome , usuarios.email , usuarios.senha,usuarios.nivelAcesso_idnivelAcesso as nivelAcesso , nivelacesso.descNivel,turma.id as idturma, turma.nome as turma , 
grupos.nome as grupo ,orientador.idUsuario as idorientador ,orientador.nome as nomeorientado
 FROM usuarios , nivelacesso,turma,grupos,usuariogrupos, usuarios as orientador
  where nivelacesso.idnivelAcesso = usuarios.nivelAcesso_idnivelAcesso 
  and usuarios.idturma = turma.id 
  and usuariogrupos.Grupos_idGrupo = grupos.idGrupo and usuariogrupos.usuarios_idUsuario  =  usuarios.idUsuario 
 and orientador.idUsuario = turma.idOrientador
ORDER BY `usuarios`.nome
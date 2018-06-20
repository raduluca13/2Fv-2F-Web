-- trigger pentru note

drop trigger t_evidenta;
create trigger t_evidenta after insert on note
for each row
begin
if(new.categorie = 1 || new.categorie = 2) then
  insert into ev_note (nr_matricol, categorie, valoare, data_notare, updated_at, id_prof, saptamana, ev_type) values (new.nr_matricol, new.categorie, new.valoare, new.data_notare, SYSDATE(), new.id_prof, new.saptamana, 'add_nota');
	else 
	insert into ev_note (nr_matricol, categorie, valoare, data_notare, updated_at, id_prof, saptamana, ev_type) values (new.nr_matricol, new.categorie, new.valoare, new.data_notare, SYSDATE(), new.id_prof, new.saptamana, 'bonus');
	end if;
end#


-- trigger pentru prezente

drop trigger t_evidenta_p;
create trigger t_evidenta_p after insert on prezente
for each row
begin
 insert into ev_note (nr_matricol, categorie, data_notare, updated_at, id_prof, saptamana, ev_type) 
 values (new.nr_matricol, new.categorie, new.data_notare, SYSDATE(), new.id_prof, new.week, 'prez');
end#

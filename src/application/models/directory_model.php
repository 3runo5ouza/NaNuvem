<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Directory_model extends CI_Model {

    /*
    * Files
    */ 
    public function get_files($cod_diretorio)
    {
        $where = array('codigo_diretorio' => $cod_diretorio);
        $this->db->select("codigo as id");
        $this->db->select("codigo_diretorio as id_dir");
        $this->db->select("nome as name");
        $this->db->select("extensao as ext");
        $query = $this->db->get_where('arquivos', $where);
        return $query->result();
    }

    public function delete_file($cod_arq)
    {
        // TODO : Consertar isso!
        $this->db->delete('versoes', array('codigo_arquivo' => $cod));
        $this->db->delete('arquivos', array('codigo' => $cod)); 
    }

    public function get_versions($cod_arq)
    {
        // select * from versoes inner join arquivos on 
        // versoes.codigo_arquivo=arquivos.codigo where codigo_arquivo=1;
        $this->db->select("versoes.codigo as id");
        $this->db->select("codigo_arquivo as id_file");
        $this->db->select("situacao as status");
        $this->db->select("data_hora as date_time");
        $this->db->select("tamanho as size");
        $this->db->select("codigo_cliente as id_client");
        $this->db->select("codigo_diretorio as id_dir");
        $this->db->select("nome as name");
        $this->db->select("extensao as ext");

        $this->db->from('versoes');
        $this->db->join('arquivos', 'versoes.codigo_arquivo = arquivos.codigo');
        $this->db->where('codigo_arquivo', $cod_arq);
        $query = $this->db->get();
        return $query->result();
    }

    public function move_file($cod_arq, $to_cod_dir)
    {
        $data = array('codigo_diretorio' => $to_cod_dir);
        $this->db->where('codigo', $cod_arq);
        $this->db->update('arquivos', $data);
    }

    public function rename_file($cod_arq, $new_name)
    {
        $data = array('nome' => $new_name);
        $this->db->where('codigo', $cod_arq);
        $this->db->update('arquivos', $data);
    }

    public function get_comments($cod_versao)
    {
        $where = array('codigo_versao' => $cod_versao);
        $query = $this->db->get_where('comentarios', $where);
        return $query->result();
    }

    /*
    * Directory
    */
    public function get_directories($cod_client)
    {

        $where = array('id_client' => $cod_client);
        $query = $this->db->get_where('listDirsFromClients', $where);
        return $query->result();
    }

    public function rename_dir($cod_dir, $new_name)
    {
        $data = array('nome' => $new_name);
        $this->db->where('codigo', $cod_dir);
        $this->db->update('diretorios', $data);
    }
}

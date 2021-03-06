<?php
    class ModeleUtilisateur extends CI_Model {

    public function __construct()
    {
        $this->load->database();
    } // __construct

    public function existe($Utilisateur) // non utilisée retour 1 si connecté, 0 sinon
    {
        $this->db->where($Utilisateur);
        $this->db->from('Client');
        return $this->db->count_all_results(); // nombre de ligne retournées par la requête
    } // existe

    public function retournerUtilisateur($Utilisateur)
    {
        $requete = $this->db->get_where('Client', $Utilisateur);
        return $requete->row(); // retour d'une seule ligne !
        // retour sous forme d'objets
    } // retournerUtilisateur

    public function insererUnClient($DonneesAInserer)
    {
        return $this->db->insert('client', $DonneesAInserer);
    }

    public function retourneUtilisateur($Utilisateur)
        {
            $this->db->select('NOM','PRENOM','ADRESSE', 'VILLE', 'CODEPOSTAL', 'EMAIL', 'MOTDEPASSE');
            $requete = $this->db->get_where('client', $this->session->NOM);
            return $requete->row_array();
        } // fin retourner nom

        public function ModifierClient($DonneesInjectees)
    {
        $this->db->where('noClient', $DonneesInjectees['NOCLIENT']);
        return $this->db->update('client', $DonneesInjectees);
    }

    Public function ModifierEmail($DonneesInjectees)
    {
        $this->db->where('noClient', $DonneesInjectees['NOCLIENT']);
        return $this->db->update('client', $DonneesInjectees);
    }

} // Fin Classe
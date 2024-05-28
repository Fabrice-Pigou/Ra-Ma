<?php 
namespace App\Forms;

class Fields
{    
    /**
     * Champ Text
     *
     * @param  string    $name        Le nom de la variable retourné
     * @param  string    $label        Label du champ
     * @param  string    $size        La taille du container(twig)
     * @param  int        $col        Le nombre de collone utilisé dans twig
     * @param  string    $required    Si le champs est obligatoir
     * @param  string    $value        Valeur du champ
     * 
     * @return string
     */
    public function Input(string $name, string $label, string $size = 'sm', int $col = 12, string $required = 'required', string $value = null): string
    {
        if (isset($_POST[$name])) $value = $_POST[$name];

        $return = '<div class="form-group col-12 col-'. $size .'-'. $col .'">';
        $return .= '<label for="'. $name .'">'. $label .'</label>';
        $return .= '<input class="form-control" id="'. $name .'" type="text" name="'. $name .'" value="'. $value .'">';
        $return .= '</div>';
        
        return $return;
    }

    /**
     * Textarea
     *
     * @param  string    $name        Le nom de la variable retourné
     * @param  string    $label        Label du champ
     * @param  string    $size        La taille du container(twig)
     * @param  int        $col        Le nombre de collone utilisé dans twig
     * @param  string    $required    Si le champs est obligatoir
     * @param  string    $value        Valeur du champ
     * @param  int        $rows        Le nombre de ligne du textarea
     * 
     * @return string
     */
    public function Textarea(string $name, string $label, string $size = 'sm', int $col = 12, string $required = 'required', int $rows = 10, string $value = null):string
    {
        if (isset($_POST[$name])) $value = $_POST[$name];

        $return = '<div class="form-group col-12 col-'. $size .'-'. $col .'">';
        $return .= '<label for="'. $name .'">'. $label .'</label>';
        $return .= '<textarea class="form-control" id="'. $name .'" rows="'. $rows .'" name="'. $name .'">'. $value .'</textarea>';
        $return .= '</div>';

        return $return;
    }

    /**
     * Champ Email
     *
     * @param  string    $name        Le nom de la variable retourné
     * @param  string    $label        Label du champ
     * @param  string    $size        La taille du container(twig)
     * @param  int        $col        Le nombre de collone utilisé dans twig
     * @param  string    $required    Si le champs est obligatoir
     * @param  string    $value        Valeur du champ
     * 
     * @return string
     */
    public function Email(string $name, string $label, string $size = 'sm', int $col = 12, string $required = 'required', string $value = null):string
    {
        if (isset($_POST[$name])) $value = $_POST[$name];

        $return = '<div class="form-group col-12 col-'. $size .'-'. $col .'">';
        $return .= '<label for="'. $name .'">'. $label .'</label>';
        $return .= '<input class="form-control" id="'. $name .'" type="email" name="'. $name .'" value="'. $value .'">';
        $return .= '</div>';
        
        return $return;
    }

    /**
     * Radio
     * Les zones d'options
     * 
     * @param  string    $name        Le nom de la variable retourné
     * @param  string    $label        Label du champ
     * @param  string    $size        La taille du container(twig)
     * @param  int        $col        Le nombre de collone utilisé dans twig
     * @param  string    $value        Valeur du champ
     * @param  string    $checked    Si une case est déjà cochée
     * 
     * @return string
     */
    public function Radio(string $name, string $label, string $value = null, string $size = 'sm', int $col = 12, string $checked = null): string
    {

        $return = '<div class="form-group form-check col-12 col-'. $size .'-'. $col .'">';
        $return .= '<input class="form-check-input texth-right" id="'. $value .'" type="radio" name="'. $name .'" value="'. $value .'" '. $checked .'>';
        $return .= '<label class="form-check-label" for="'. $value .'">'. $label .'</label>';
        $return .= '</div>';

        return $return;
    }

    /**
     * Champ Password
     *
     * @param  string    $name        Le nom de la variable retourné
     * @param  string    $label        Label du champ
     * @param  string    $size        La taille du container(twig)
     * @param  int        $col        Le nombre de collone utilisé dans twig
     * @param  string    $required    Si le champs est obligatoir
     * @param  string    $value        Valeur du champ
     * 
     * @return string
     */
    public function Password(string $name, string $label, string $size = 'sm', int $col = 12, string $required = 'required', string $value = null): string
    {
        if (isset($_POST[$name])) $value = $_POST[$name];

        $return = '<div class="form-group col-12 col-'. $size .'-'. $col .'">';
        $return .= '<label for="'. $name .'">'. $label .'</label>';
        $return .= '<input class="form-control" id="'. $name .'" type="password" name="'. $name .'" value="'. $value .'">';
        $return .= '</div>';
        
        return $return;
    }

    /**
     * Champ Term
     *
     * @param  string    $name        Le nom de la variable retourné
     * @param  string    $label        Label du champ
     * @param  string    $size        La taille du container(twig)
     * @param  int        $col        Le nombre de collone utilisé dans twig
     * @param  string    $required    Si le champs est obligatoir
     * @param  string    $value        Valeur du champ
     * 
     * @return string
     */
    public function Term(string $name, string $label, string $size = 'sm', int $col = 12, string $required = 'required', string $value = null):string
    {
        if (isset($_POST[$name])) $value = $_POST[$name];
        else $value = date('Y-m-d');

        $return = '<div class="form-group col-12 col-'. $size .'-'. $col .'">';
        $return .= '<label for="'. $name .'">'. $label .'</label>';
        $return .= '<input class="form-control" id="'. $name .'" type="date" name="'. $name .'" value="'. $value .'" required>';
        $return .= '</div>';

        return $return;
    }

    /**
     * Day 
     * Champ pour les jour d'un mois 1, 2, 3, 4, 5... 31
     *
     * @param  string    $name        Le nom de la variable retourné
     * @param  string    $label        Label du champ
     * @param  string    $size        La taille du container(twig)
     * @param  int        $col        Le nombre de collone utilisé dans twig
     * 
     * @return string
     */
    public function Day(string $name, string $label, string $size = 'sm', int $col = 12): string
    {
        $return = '<div class="form-group col-12 col-'. $size .'-'. $col .'">';
        $return .= '<label for="'. $name .'">'. $label .'</label>';
        $return .= '<select class="form-control" id="'. $name .'" name="'. $name .'">';
        $return .= '<option value="null">Choisir...</option>';
        for ($k = 1; $k <= 31; $k++)
        {
            $selected = '';
            if (isset($_POST[$name]) AND $_POST[$name] == $k) $selected ='selected';
            $return .= '<option value="'. $k .'" '. $selected .'>'. $k .'</option>';
        }
        $return .= '</select>';
        $return .= '</div>';
        return $return;
    }

    /**
     * Champ Number
     *
     * @param  string    $name        Le nom de la variable retourné
     * @param  string    $label        Label du champ
     * @param  string    $size        La taille du container(twig)
     * @param  int        $col        Le nombre de collone utilisé dans twig
     * @param  string    $required    Si le champs est obligatoir
     * @param  string    $value        Valeur du champ
     * 
     * @return string
     */
    public function Number(string $name, string $label, string $size = 'sm', int $col = 12, string $required = 'required', string $value = null): string
    {
        if (isset($_POST[$name])) $value = $_POST[$name];

        $return = '<div class="form-group col-12 col-'. $size .'-'. $col .'">';
        $return .= '<label for="'. $name .'">'. $label .'</label>';
        $return .= '<input class="form-control" id="'. $name .'" type="number" name="'. $name .'" value="'. $value .'">';
        $return .= '</div>';

        return $return;
    }

    /**
     * Champ Float
     *
     * @param  string    $name        Le nom de la variable retourné
     * @param  string    $label        Label du champ
     * @param  string    $size        La taille du container(twig)
     * @param  int        $col        Le nombre de collone utilisé dans twig
     * @param  string    $required    Si le champs est obligatoir
     * @param  string    $value        Valeur du champ
     * 
     * @return string
     */
    public function Float(string $name, string $label, string $size = 'sm', int $col = 12, string $required = 'required', string $value = null):string
    {
        if (isset($_POST[$name]) && $_POST[$name] != 0) $value = $_POST[$name];

        $return = '<div class="form-group col-12 col-'. $size .'-'. $col .'">';
        $return .= '<label for="'. $name .'">'. $label .'</label>';
        $return .= '<input class="form-control texth-right" id="'. $name .'" type="float" name="'. $name .'" value="'. $value .'">';
        $return .= '</div>';

        return $return;
    }

    /**
     * Champs Select
     *
     * @param  string    $name    Le nom de la variable retourné
     * @param  string    $label    Label du champ
     * @param  string    $size    La taille du container(twig)
     * @param  int        $col    Le nombre de collone utilisé dans twig
     * @param  array    $data    Le tableau pour lister les option
     * 
     * @return string
     */
    public function Select(string $name, string $label, array $data = [], string $size = 'sm', int $col = 12): string
    {
        /**
         * @var string $selected Si une option a déjà été selectionée
         */
        $return = '<div class="form-group col-12 col-'. $size .'-'. $col .'">';
        $return .= '<label for="'. $name .'">'. $label .'</label>';
        $return .= '<select class="form-control" id="'. $name .'" name="'. $name .'">';
        $return .= '<option value="null">Choisir...</option>';

        foreach ($data as $k => $n) {
            $selected = '';
            if (isset($_POST[$name]) AND $_POST[$name] == $k) $selected ='selected';
            $return .= '<option value="'. $k .'" '. $selected .'>'. $n->name .'</option>';
        }
        $return .= '</select>';
        $return .= '</div>';
        return $return;
    }

    /**
     * Champs Hidden
     *
     * @param  string    $name    Le nom de la variable retourné
     * @param  string    $value    Valeur du champ
     * 
     * @return string
     */
    public function Hidden($name, $value = 0): string
    {
        if (isset($_POST[$name])) $value = $_POST[$name];

        return '<input type="hidden" name="'. $name .'" value="'. $value .'">';
    }

    /**
     * Champs Submit
     *
     * @param  string    $value    Le nom du bouton
     * 
     * @return string
     */
    public function Submit($value = 'Envoyer'):string
    {
        $return = '<div class="col-12 p-0">';
        $return .= '<button type="submit" class="btn btn-primary ml-3">'. $value .'</button>';
        $return .= '</div>';

        return $return;
    }

    /**
     * Champ Checkbox
     *
     * @param  string    $label        Label du champ
     * @param  string    $size        La taille du container(twig)
     * @param  int        $col        Le nombre de collone utilisé dans twig
     * @param  array    $data        Tableau contenant les valeurs pour les checkbox
     * 
     * @return string
     */
    public function Checkbox(array $datas = [], $label, string $size = 'sm', int $col = 12): string
    {
        $return = '<div>'. $label .'</div>';
        $return .= '<div class="form-group form-check col-12 col-'. $size .'-'. $col .'">';
        foreach ($datas as $data) {
            $checked = '';
            foreach ($datas as $value) if ($data->id == $value->category) $checked ='checked';

            $return .= '<input class="" type="checkbox" name="'. $data->id .'" id="'. $data->id .'" '. $checked .'>';
            $return .= '<label class="form-check-label pl-2" for="'. $data->id .'">'. $data->name .'</label>';
        }
        $return .= '</div>';
        return $return;
    }
}
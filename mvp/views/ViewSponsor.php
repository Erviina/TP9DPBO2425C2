<?php
include_once("KontrakSponsorView.php");

class ViewSponsor implements KontrakSponsorView {

    public function __construct(){
        // kosong
    }

    public function tampilSponsor($listSponsor): string {

        // Generate baris tabel
        $tbody = '';
        $no = 1;
        foreach($listSponsor as $sponsor){
            $tbody .= '<tr>';
            $tbody .= '<td>'. $no .'</td>';
            $tbody .= '<td>'. htmlspecialchars($sponsor['nama']) .'</td>';
            $tbody .= '<td>'. htmlspecialchars($sponsor['negara']) .'</td>';
            $tbody .= '<td>'. htmlspecialchars($sponsor['kontrakMulai']) .'</td>';
            $tbody .= '<td>'. htmlspecialchars($sponsor['kontrakSelesai']) .'</td>';

            $tbody .= '<td class="col-actions">
                    <a href="index.php?screen=edit_sponsor&id='. $sponsor['id'] .'" class="btn btn-edit">Edit</a>
                    <a href="index.php?screen=delete_sponsor&id='. $sponsor['id'] .'" 
                       class="btn btn-danger" onclick="return confirm(\'Yakin mau hapus?\')">
                       Hapus</a>
                </td>';

            $tbody .= '</tr>';
            $no++;
        }

        // Load template skin seperti pembalap
        $templatePath = __DIR__ . '/../template/skin_sponsor.html';
        $template = '';

        if (file_exists($templatePath)) {
            $template = file_get_contents($templatePath);
            $template = str_replace('<!-- PHP will inject rows here -->', $tbody, $template);

            $total = count($listSponsor);
            $template = str_replace('Total:', 'Total: ' . $total, $template);

            return $template;
        }

        // fallback
        return $tbody;
    }


    public function tampilFormSponsor($data = null): string {
    $template = file_get_contents(__DIR__ . '/../template/form_sponsor.html');

    $template = str_replace('{{id}}', $data['id'] ?? '', $template);
    $template = str_replace('{{nama}}', htmlspecialchars($data['nama'] ?? ''), $template);
    $template = str_replace('{{negara}}', htmlspecialchars($data['negara'] ?? ''), $template);
    $template = str_replace('{{mulai}}', $data['kontrakMulai'] ?? '', $template);
    $template = str_replace('{{selesai}}', $data['kontrakSelesai'] ?? '', $template);
    $template = str_replace('{{action}}', $data ? 'edit' : 'add', $template);

    return $template;
}


}
?>

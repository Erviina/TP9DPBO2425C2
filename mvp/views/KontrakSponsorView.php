<?php
interface KontrakSponsorView {
    public function tampilSponsor($listSponsor): string;
    public function tampilFormSponsor($data = null): string;
}
?>

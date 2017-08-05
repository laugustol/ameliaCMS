<?php  
require_once 'third_party/fpdf/fpdf.php';
class clsFpdf extends FPDF{
    var $widths;
    var $aligns;
    public $code,$org;
    public function Footer(){
        $this->SetY(-20);
        $this->SetFont("Arial","I",8);
        $this->SetFont('Arial','',13);
        $this->SetFillColor(240,240,240);
        $this->SetTextColor(200, 200, 200);     
        $this->Cell(0,5,"______________________________________________________________________________________________________________",0,1,"C",false);
        $this->SetFont('Arial','',9);
        $this->SetTextColor(0,0,0);     
        $this->Cell(254);
        $this->Cell(25,8,utf8_decode('Página ').$this->PageNo()."/{nb}",0,1,'C',true);
        $this->Ln(-9);
        $this->SetFont("Arial","I",6);
        $this->Cell(70);
        $this->Cell(130,3,utf8_decode($this->org["name_two"]),0,1,"C");
        $this->Cell(70);  
        $this->Cell(130,3,utf8_decode(organization_address.": ".$this->org["address"]),0,1,"C");
        $this->Cell(70);  
        $this->Cell(130,3,utf8_decode(organization_phones.": ".$this->org["phone_one"]." / ".$this->org["phone_two"]." / ".$this->org["phone_three"]),0,1,"C");
        $this->Cell(70);
        $this->Cell(130,3,utf8_decode(id.": ".$this->code),0,1,"C");
    }
    function SetWidths($w){
        $this->widths=$w;
    }
    function SetAligns($a){
        $this->aligns=$a;
    }
    function Row($data){
        $nb=0;
        for($i=0;$i<count($data);$i++)
            $nb=max($nb,$this->NbLines($this->widths[$i],$data[$i]));
        $h=5*$nb;
        $this->CheckPageBreak($h);
        for($i=0;$i<count($data);$i++){
            $w=$this->widths[$i];
            $a=isset($this->aligns[$i]) ? $this->aligns[$i] : 'L';
            $x=$this->GetX();
            $y=$this->GetY();
            $this->Rect($x,$y,$w,$h);
            if((count($data)-1)==$i && (strtolower($data[count($data)-1])=='desactivado'))        
                $this->SetTextColor(255, 0, 0);
            else 
                $this->SetTextColor(0, 0, 0);
            $this->MultiCell($w,5,$data[$i],0,$a);
            $this->SetXY($x+$w,$y);
        }
        $this->Ln($h);
    }
    function CheckPageBreak($h){
        if($this->GetY()+$h>$this->PageBreakTrigger)
            $this->AddPage($this->CurOrientation);
    }
    function NbLines($w,$txt){
        $cw=&$this->CurrentFont['cw'];
        if($w==0)
            $w=$this->w-$this->rMargin-$this->x;
        $wmax=($w-2*$this->cMargin)*1000/$this->FontSize;
        $s=str_replace("\r",'',$txt);
        $nb=strlen($s);
        if($nb>0 and $s[$nb-1]=="\n")
            $nb--;
        $sep=-1;
        $i=0;
        $j=0;
        $l=0;
        $nl=1;
        while($i<$nb){
            $c=$s[$i];
            if($c=="\n")
            {
            $i++;
            $sep=-1;
            $j=$i;
            $l=0;
            $nl++;
            continue;
        }
        if($c==' ')
        $sep=$i;
        $l+=$cw[$c];
        if($l>$wmax){
            if($sep==-1){
                if($i==$j)
                    $i++;
            }else
                $i=$sep+1;
                $sep=-1;
                $j=$i;
                $l=0;
                $nl++;
        }else
            $i++;
        }
        return $nl;
    }
    public function Header(){
        if($this->org["idgallery_header"]!=0){
            $this->Image(url_base.$this->org["src_header"],25,15,250,40);
            $this->Ln(55);
        }
        $this->SetFont('Arial','B',12);
        $this->Cell(0,6,utf8_decode(pdf_service_list),0,1,"C");
        $this->Ln(8);
        $this->SetFillColor(0,0,140);
        $this->SetTitle(service, true);
        $this->SetFont('Arial','B',10);
        $this->SetTextColor(0,0,0);
        $this->Cell(43);
        $this->Cell(15,7,utf8_decode(id),1,0,'C',false);
        $this->Cell(50,7,utf8_decode(service_father),1,0,'C',false);
        $this->Cell(50,7,utf8_decode(service_name),1,0,'C',false);
        $this->Cell(50,7,utf8_decode(service_url),1,0,'C',false);
        $this->Cell(26,7,utf8_decode(status),1,1,'C',false);
        $this->Cell(43);
    }
}
$pdf=new clsFpdf;
$pdf->code = $randon;
$pdf->org = $org;
$pdf->AddPage("L");
$pdf->AliasNbPages();
$pdf->SetFont('Arial','',12);
$pdf->SetWidths(array(15,50,50,50,26));
$pdf->SetAligns(array("C","C","C","C","C"));
if(count($services)!=0){
    $pdf->SetFillColor(0,0,140); 
    $pdf->SetFont('Arial','',8);
    $pdf->SetTextColor(0,0,0); 
    foreach ($services as $k1 => $service) {
        $pdf->Row(array($service["idservice"],
                $service["module"],
                $service["name"],
                $service["url"],
                ($service["status"])? activate : deactivate));
        $pdf->Cell(43);
    }
    $pdf->Output('documento',"I");
}else{
    echo "ERROR AL GENERAR ESTE REPORTE!";          
}
?>

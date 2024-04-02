$this->load->model('siswa_model');
$data['siswa'] = $this->siswa_model->getData();
$this->load->library('pdf');
$this->pdf->setPaper('A4', 'potrait');
$this->pdf->filename = "laporan-data-siswa.pdf";
$this->pdf->load_view('laporan_siswa', $data);
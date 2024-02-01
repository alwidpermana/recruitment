<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pelamar extends CI_Controller {
	function __construct(){
		parent::__construct();
		if (!$this->session->userdata("is_login")) {
			redirect(base_url());
		}elseif ($this->session->userdata("jenis") != 'Eksternal') {
			redirect(base_url('dashboard'));
		}
		$this->load->model("m_pelamar");
		$this->load->model("m_process_data");
		// if ($this->session->userdata("is_login")) {
		// 	redirect(base_url("dashboard"));
		// }
	}
	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
		$data['side'] = 'pelamar';
		$data['menu'] = '';
		$data['sub_menu1'] = '';
		$data['sub_menu2'] = '';
		$data['mobile'] = false;
		$data['link1'] = '';
		$data['link2'] = '';
		$data['page'] = 'Data Pelamar';
		$this->load->view("eksternal/pelamar/index", $data);
	}

	public function getDataPelamar()
  {
    $draw = intval($this->input->post("draw"));
    $start = intval($this->input->post("start"));
    $length = intval($this->input->post("length"));
    $order = $this->input->post("order");
    $search = $this->input->post("search");
    $search = $search['value'];
    $col = 0;
    $dir = "";
    if (!empty($order)) {
      foreach ($order as $o) {
        $col = $o['column'];
        $dir = $o['dir'];
      }
    }

    if ($dir != "asc" && $dir != "desc") {
      $dir = "desc";
    }
    $valid_columns = array(
      0 => 'created_at',
      1 => 'nama',
      2 => 'no_hp',
      3 => 'email',
      4 => 'tempat_lahir',
      5 => 'tgl_lahir',
      6 => 'jenis_kelamin',
      7 => 'status_pernikahan',
      8 =>'jml_anak',
      9 => 'golongan_darah',
      10 => 'agama',
      11 => 'no_ktp',
      12 => 'kode_pos',
      13 =>'alamat_ktp',
      14 => 'alamat_domisili'
    );
    if (!isset($valid_columns[$col])) {
      $order = null;
    } else {
      $order = $valid_columns[$col];
    }
    if ($order != null) {
      $this->db->order_by($order, $dir);
    }

    $x=0;

    $inputSearch = $this->input->get("inputSearch");
		foreach ($valid_columns as $sterm) // loop kolom 
    {
        if (!empty($search)) // jika datatable mengirim POST untuk search
        {
            if ($x === 0) // looping pertama
            {
                $this->db->group_start();
                $this->db->like($sterm, $search);
            } else {
                $this->db->or_like($sterm, $search);
            }
            if (count($valid_columns) - 1 == $x) //looping terakhir
                $this->db->group_end();
        }
        $x++;
    }
		

    $this->db->limit($length, $start);
    $user_id = $this->session->userdata("user_id");
    $this->db->where("user_id",$user_id);
    $pelamar = $this->m_pelamar->getDataPelamar();
    $data = array();
    $i = $start+1;
    foreach ($pelamar->result() as $rows) {
      $data[] = array(
        $i,
        '<div class="dropdown me-1">
                          <button
                            type="button"
                            class="btn btn-secondary dropdown-toggle"
                            id="dropdownMenuOffset"
                            data-bs-toggle="dropdown"
                            aria-haspopup="true"
                            aria-expanded="false"
                            data-bs-offset="10,20"
                          >
                            <i class="bi bi-gear"></i>
                          </button>
                          <div class="dropdown-menu" aria-labelledby="dropdownMenuOffset">
                            <a class="dropdown-item" href="'.base_url().'pelamar/edit/'.$rows->id.'">Edit</a>
                            <a class="dropdown-item hapusData" href="javascript:;">Hapus Data</a>
                          </div>
                        </div>',
        '<div class="sw-10 sh-10 me-1 mb-1 d-inline-block"><img src="'.base_url().''.$rows->foto.'" class="img-fluid img-fluid-height rounded-md" alt="thumb" /></div>',
       	$rows->nama,
        $rows->no_hp,
        $rows->email,
        $rows->tempat_lahir,
        date("d-m-Y", strtotime($rows->tgl_lahir)),
        $rows->jenis_kelamin,
        $rows->status_pernikahan == 'Y' ? 'Menikah' : 'Belum Menikah',
        $rows->jml_anak,
        $rows->golongan_darah,
        $rows->agama,
        $rows->no_ktp,
        $rows->kode_pos,
        $rows->alamat_ktp,
        $rows->alamat_domisili,
        $rows->cv,
        $rows->ijazah_terakhir,
        $rows->surat_lamaran,
        $rows->skck,
        $rows->ktp,
        $rows->surat_keterangan_sehat,
        $rows->surat_ijin,
        $rows->kartu_keluarga,
        $rows->sertifikat_vaksin,
        $rows->surat_bebas_narkoba
      );

      $i++;
    }
    $totalPelamar = $this->totalPelamar();
    $output = array(
      "draw" => $draw,
      "recordsTotal" => $totalPelamar,
      "recordsFiltered" => $totalPelamar,
      "data" => $data
    );
    echo json_encode($output);
    exit();
  }
  public function totalPelamar()
  {
    $query = $this->m_pelamar->getJmlPelamar();
    
    $result = $query->row();
    if (isset($result))
      return $result->num;
    return 0;
  }

  public function add()
  {
  	$data['side'] = 'pelamar';
	$data['menu'] = 'Pelamar';
	$data['sub_menu1'] = 'Add';
	$data['uuid'] = $this->uuid->v4();
	$data['sub_menu2'] = '';
	$data['mobile'] = true;
	$data['link1'] = base_url().'pelamar/';
	$data['link2'] = 'javascript:;';
  $data['link3'] = 'javascript:;';
	$data['page'] = 'Add Pelamar';
	$this->load->view("eksternal/pelamar/add", $data);
  }
  public function edit($id)
  {
    $data['side'] = 'pelamar';
    $data['menu'] = 'Pelamar';
    $data['sub_menu1'] = 'Edit';
    $data['uuid'] = $id;
    $data['sub_menu2'] = '';
    $data['mobile'] = true;
    $data['link1'] = base_url().'pelamar/';
    $data['link2'] = 'javascript:;';
    $data['link3'] = 'javascript:;';
    $data['data'] = $this->db->query("SELECT * FROM pelamar WHERE id = '$id'")->row();
    $data['page'] = 'Edit Pelamar';
    $this->load->view("eksternal/pelamar/edit", $data);
  }
}
?>
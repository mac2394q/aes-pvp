<?php session_start(); ?>
<!DOCTYPE html>
<html class="loading" lang="es-ES" data-textdirection="ltr">

<head>
  <?php
       include_once($_SERVER['DOCUMENT_ROOT'].'/conf.php');
       require_once (PLATFORM_PATH."global/inc/platform/head.php");
       require_once (LIB_PATH."session.php");
       require_once (CONTROLLERS_PATH."empresaController.php");
       require_once (CONTROLLERS_PATH."areaController.php");

       session::verificarSesion($_SESSION['idsesion']);
       date_default_timezone_set('America/Bogota');
       setlocale(LC_ALL,"es_CO");

      //  echo "id".$_SESSION['idusuario'];
      //print_r($_SESSION);
    ?>
  <style>
    .user-profile {
      background: url(https://pixinvent.com/modern-admin-clean-bootstrap-4-dashboard-html-template/app-assets/images/gallery/dark-menu.jpg) center center no-repeat;
    }

    .user-profile .user-info {
      background-color: rgba(0, 0, 0, 0.35);
    }
  </style>
</head>

<body class="vertical-layout vertical-menu-modern material-vertical-layout material-layout 2-columns   fixed-navbar"
  data-open="click" data-menu="vertical-menu-modern" data-col="2-columns">

  <!-- fixed-top-->
  <?php
    /* top bar  */
    require_once (PLATFORM_PATH."global/inc/component/fixed_top.php");
    /* Menu  */
    require_once (PLATFORM_PATH."global/inc/component/main_menu.php");
  ?>

  <div class="app-content content">
    <div class="content-wrapper">

      <div class="content-header row">
        <div class="content-header-dark bg-img col-12">
          <div class="row">
            <div class="content-header-left col-md-9 col-12 mb-2">
              <h3 class="content-header-title white"><i class="fa fa-mail-bulk"></i>Calendario de notificaciones </h3>
              <div class="row breadcrumbs-top">
                <div class="breadcrumb-wrapper col-12">
                  <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index-2.html">Auditorias proximas</a>
                    </li>
                    <li class="breadcrumb-item"><a href="#">Auditorias Vencidas</a>
                    </li>

                    <li class="breadcrumb-item "><a href="#">Eventos </a>
                    </li>
                  </ol>

                </div>
              </div>
            </div>
            <div class="content-header-right col-md-3 col-12">
              <div class="btn-group float-md-right">
                <button class="btn btn-info dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true"
                  aria-expanded="false">Herramientas</button>
                <div class="dropdown-menu arrow">
                  <a class="dropdown-item" href="<?php echo MODULE_APP_SERVER."calendario/";?>"><i
                      class="fa fa-calendar-check mr-1"></i>Calendario</a>
                  <a class="dropdown-item" href="#"><i class="fa fa-language mr-1"></i>Mi idioma</a>
                  <div class="dropdown-divider"></div>
                  <a class="dropdown-item" href="#"><i class="fa fa-cog mr-1"></i>Configuracion</a>
                </div>
              </div>
            </div>


          </div>
        </div>
      </div>
      <div class="content-body">
        <div class="content-body">
          <div class="row">
            <section id="basic-examples">
              <div class="row">
                <div class="col-12">
                  <div class="card">
                    <div class="card-header">
                      <h4 class="card-title">Default</h4>
                      <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
                      <div class="heading-elements">
                        <ul class="list-inline mb-0">
                          <li><a data-action="collapse"><i class="ft-minus"></i></a></li>
                          <li><a data-action="reload"><i class="ft-rotate-cw"></i></a></li>
                          <li><a data-action="close"><i class="ft-x"></i></a></li>
                        </ul>
                      </div>
                    </div>
                    <div class="card-content collapse show">
                      <div class="card-body">
                        <p class="card-text">This is the most basic example having navigation button to navigate next
                          and
                          previous months and today button. This basic example lists all the events on the calendar.</p>
                        <div id="fc-default" class="fc fc-unthemed fc-ltr">
                          <div class="fc-toolbar fc-header-toolbar">
                            <div class="fc-left">
                              <h2>June 2016</h2>
                            </div>
                            <div class="fc-right"><button type="button"
                                class="fc-today-button fc-button fc-state-default fc-corner-left fc-corner-right">today</button>
                              <div class="fc-button-group"><button type="button"
                                  class="fc-prev-button fc-button fc-state-default fc-corner-left"
                                  aria-label="prev"><span
                                    class="fc-icon fc-icon-left-single-arrow"></span></button><button type="button"
                                  class="fc-next-button fc-button fc-state-default fc-corner-right"
                                  aria-label="next"><span class="fc-icon fc-icon-right-single-arrow"></span></button>
                              </div>
                            </div>
                            <div class="fc-center"></div>
                            <div class="fc-clear"></div>
                          </div>
                          <div class="fc-view-container" style="">
                            <div class="fc-view fc-month-view fc-basic-view" style="">
                              <table class="">
                                <thead class="fc-head">
                                  <tr>
                                    <td class="fc-head-container fc-widget-header">
                                      <div class="fc-row fc-widget-header">
                                        <table class="">
                                          <thead>
                                            <tr>
                                              <th class="fc-day-header fc-widget-header fc-sun"><span>Sun</span></th>
                                              <th class="fc-day-header fc-widget-header fc-mon"><span>Mon</span></th>
                                              <th class="fc-day-header fc-widget-header fc-tue"><span>Tue</span></th>
                                              <th class="fc-day-header fc-widget-header fc-wed"><span>Wed</span></th>
                                              <th class="fc-day-header fc-widget-header fc-thu"><span>Thu</span></th>
                                              <th class="fc-day-header fc-widget-header fc-fri"><span>Fri</span></th>
                                              <th class="fc-day-header fc-widget-header fc-sat"><span>Sat</span></th>
                                            </tr>
                                          </thead>
                                        </table>
                                      </div>
                                    </td>
                                  </tr>
                                </thead>
                                <tbody class="fc-body">
                                  <tr>
                                    <td class="fc-widget-content">
                                      <div class="fc-scroller fc-day-grid-container"
                                        style="overflow: hidden; height: 687px;">
                                        <div class="fc-day-grid fc-unselectable">
                                          <div class="fc-row fc-week fc-widget-content fc-rigid" style="height: 114px;">
                                            <div class="fc-bg">
                                              <table class="">
                                                <tbody>
                                                  <tr>
                                                    <td class="fc-day fc-widget-content fc-sun fc-other-month fc-past"
                                                      data-date="2016-05-29"></td>
                                                    <td class="fc-day fc-widget-content fc-mon fc-other-month fc-past"
                                                      data-date="2016-05-30"></td>
                                                    <td class="fc-day fc-widget-content fc-tue fc-other-month fc-past"
                                                      data-date="2016-05-31"></td>
                                                    <td class="fc-day fc-widget-content fc-wed fc-past"
                                                      data-date="2016-06-01"></td>
                                                    <td class="fc-day fc-widget-content fc-thu fc-past"
                                                      data-date="2016-06-02"></td>
                                                    <td class="fc-day fc-widget-content fc-fri fc-past"
                                                      data-date="2016-06-03"></td>
                                                    <td class="fc-day fc-widget-content fc-sat fc-past"
                                                      data-date="2016-06-04"></td>
                                                  </tr>
                                                </tbody>
                                              </table>
                                            </div>
                                            <div class="fc-content-skeleton">
                                              <table>
                                                <thead>
                                                  <tr>
                                                    <td class="fc-day-top fc-sun fc-other-month fc-past"
                                                      data-date="2016-05-29"><span class="fc-day-number">29</span></td>
                                                    <td class="fc-day-top fc-mon fc-other-month fc-past"
                                                      data-date="2016-05-30"><span class="fc-day-number">30</span></td>
                                                    <td class="fc-day-top fc-tue fc-other-month fc-past"
                                                      data-date="2016-05-31"><span class="fc-day-number">31</span></td>
                                                    <td class="fc-day-top fc-wed fc-past" data-date="2016-06-01"><span
                                                        class="fc-day-number">1</span></td>
                                                    <td class="fc-day-top fc-thu fc-past" data-date="2016-06-02"><span
                                                        class="fc-day-number">2</span></td>
                                                    <td class="fc-day-top fc-fri fc-past" data-date="2016-06-03"><span
                                                        class="fc-day-number">3</span></td>
                                                    <td class="fc-day-top fc-sat fc-past" data-date="2016-06-04"><span
                                                        class="fc-day-number">4</span></td>
                                                  </tr>
                                                </thead>
                                                <tbody>
                                                  <tr>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                    <td class="fc-event-container"><a
                                                        class="fc-day-grid-event fc-h-event fc-event fc-start fc-end fc-draggable fc-resizable">
                                                        <div class="fc-content"> <span class="fc-title">All Day
                                                            Event</span></div>
                                                        <div class="fc-resizer fc-end-resizer"></div>
                                                      </a></td>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                  </tr>
                                                </tbody>
                                              </table>
                                            </div>
                                          </div>
                                          <div class="fc-row fc-week fc-widget-content fc-rigid" style="height: 114px;">
                                            <div class="fc-bg">
                                              <table class="">
                                                <tbody>
                                                  <tr>
                                                    <td class="fc-day fc-widget-content fc-sun fc-past"
                                                      data-date="2016-06-05"></td>
                                                    <td class="fc-day fc-widget-content fc-mon fc-past"
                                                      data-date="2016-06-06"></td>
                                                    <td class="fc-day fc-widget-content fc-tue fc-past"
                                                      data-date="2016-06-07"></td>
                                                    <td class="fc-day fc-widget-content fc-wed fc-past"
                                                      data-date="2016-06-08"></td>
                                                    <td class="fc-day fc-widget-content fc-thu fc-past"
                                                      data-date="2016-06-09"></td>
                                                    <td class="fc-day fc-widget-content fc-fri fc-past"
                                                      data-date="2016-06-10"></td>
                                                    <td class="fc-day fc-widget-content fc-sat fc-past"
                                                      data-date="2016-06-11"></td>
                                                  </tr>
                                                </tbody>
                                              </table>
                                            </div>
                                            <div class="fc-content-skeleton">
                                              <table>
                                                <thead>
                                                  <tr>
                                                    <td class="fc-day-top fc-sun fc-past" data-date="2016-06-05"><span
                                                        class="fc-day-number">5</span></td>
                                                    <td class="fc-day-top fc-mon fc-past" data-date="2016-06-06"><span
                                                        class="fc-day-number">6</span></td>
                                                    <td class="fc-day-top fc-tue fc-past" data-date="2016-06-07"><span
                                                        class="fc-day-number">7</span></td>
                                                    <td class="fc-day-top fc-wed fc-past" data-date="2016-06-08"><span
                                                        class="fc-day-number">8</span></td>
                                                    <td class="fc-day-top fc-thu fc-past" data-date="2016-06-09"><span
                                                        class="fc-day-number">9</span></td>
                                                    <td class="fc-day-top fc-fri fc-past" data-date="2016-06-10"><span
                                                        class="fc-day-number">10</span></td>
                                                    <td class="fc-day-top fc-sat fc-past" data-date="2016-06-11"><span
                                                        class="fc-day-number">11</span></td>
                                                  </tr>
                                                </thead>
                                                <tbody>
                                                  <tr>
                                                    <td rowspan="2"></td>
                                                    <td rowspan="2"></td>
                                                    <td class="fc-event-container" colspan="3"><a
                                                        class="fc-day-grid-event fc-h-event fc-event fc-start fc-end fc-draggable fc-resizable">
                                                        <div class="fc-content"> <span class="fc-title">Long
                                                            Event</span>
                                                        </div>
                                                        <div class="fc-resizer fc-end-resizer"></div>
                                                      </a></td>
                                                    <td rowspan="2"></td>
                                                    <td class="fc-event-container" rowspan="2"><a
                                                        class="fc-day-grid-event fc-h-event fc-event fc-start fc-not-end fc-draggable">
                                                        <div class="fc-content"> <span
                                                            class="fc-title">Conference</span>
                                                        </div>
                                                      </a></td>
                                                  </tr>
                                                  <tr>
                                                    <td></td>
                                                    <td></td>
                                                    <td class="fc-event-container"><a
                                                        class="fc-day-grid-event fc-h-event fc-event fc-start fc-end fc-draggable">
                                                        <div class="fc-content"><span class="fc-time">4p</span> <span
                                                            class="fc-title">Repeating Event</span></div>
                                                      </a></td>
                                                  </tr>
                                                </tbody>
                                              </table>
                                            </div>
                                          </div>
                                          <div class="fc-row fc-week fc-widget-content fc-rigid" style="height: 114px;">
                                            <div class="fc-bg">
                                              <table class="">
                                                <tbody>
                                                  <tr>
                                                    <td class="fc-day fc-widget-content fc-sun fc-past"
                                                      data-date="2016-06-12"></td>
                                                    <td class="fc-day fc-widget-content fc-mon fc-past"
                                                      data-date="2016-06-13"></td>
                                                    <td class="fc-day fc-widget-content fc-tue fc-past"
                                                      data-date="2016-06-14"></td>
                                                    <td class="fc-day fc-widget-content fc-wed fc-past"
                                                      data-date="2016-06-15"></td>
                                                    <td class="fc-day fc-widget-content fc-thu fc-past"
                                                      data-date="2016-06-16"></td>
                                                    <td class="fc-day fc-widget-content fc-fri fc-past"
                                                      data-date="2016-06-17"></td>
                                                    <td class="fc-day fc-widget-content fc-sat fc-past"
                                                      data-date="2016-06-18"></td>
                                                  </tr>
                                                </tbody>
                                              </table>
                                            </div>
                                            <div class="fc-content-skeleton">
                                              <table>
                                                <thead>
                                                  <tr>
                                                    <td class="fc-day-top fc-sun fc-past" data-date="2016-06-12"><span
                                                        class="fc-day-number">12</span></td>
                                                    <td class="fc-day-top fc-mon fc-past" data-date="2016-06-13"><span
                                                        class="fc-day-number">13</span></td>
                                                    <td class="fc-day-top fc-tue fc-past" data-date="2016-06-14"><span
                                                        class="fc-day-number">14</span></td>
                                                    <td class="fc-day-top fc-wed fc-past" data-date="2016-06-15"><span
                                                        class="fc-day-number">15</span></td>
                                                    <td class="fc-day-top fc-thu fc-past" data-date="2016-06-16"><span
                                                        class="fc-day-number">16</span></td>
                                                    <td class="fc-day-top fc-fri fc-past" data-date="2016-06-17"><span
                                                        class="fc-day-number">17</span></td>
                                                    <td class="fc-day-top fc-sat fc-past" data-date="2016-06-18"><span
                                                        class="fc-day-number">18</span></td>
                                                  </tr>
                                                </thead>
                                                <tbody>
                                                  <tr>
                                                    <td class="fc-event-container"><a
                                                        class="fc-day-grid-event fc-h-event fc-event fc-not-start fc-end fc-draggable fc-resizable">
                                                        <div class="fc-content"> <span
                                                            class="fc-title">Conference</span>
                                                        </div>
                                                        <div class="fc-resizer fc-end-resizer"></div>
                                                      </a></td>
                                                    <td class="fc-event-container" rowspan="6"><a
                                                        class="fc-day-grid-event fc-h-event fc-event fc-start fc-end fc-draggable">
                                                        <div class="fc-content"><span class="fc-time">7a</span> <span
                                                            class="fc-title">Birthday Party</span></div>
                                                      </a></td>
                                                    <td rowspan="6"></td>
                                                    <td rowspan="6"></td>
                                                    <td class="fc-event-container" rowspan="6"><a
                                                        class="fc-day-grid-event fc-h-event fc-event fc-start fc-end fc-draggable">
                                                        <div class="fc-content"><span class="fc-time">4p</span> <span
                                                            class="fc-title">Repeating Event</span></div>
                                                      </a></td>
                                                    <td rowspan="6"></td>
                                                    <td rowspan="6"></td>
                                                  </tr>
                                                  <tr>
                                                    <td class="fc-event-container fc-limited"><a
                                                        class="fc-day-grid-event fc-h-event fc-event fc-start fc-end fc-draggable">
                                                        <div class="fc-content"><span class="fc-time">10:30a</span>
                                                          <span class="fc-title">Meeting</span></div>
                                                      </a></td>
                                                    <td class="fc-more-cell" rowspan="1">
                                                      <div><a class="fc-more">+5 more</a></div>
                                                    </td>
                                                  </tr>
                                                  <tr class="fc-limited">
                                                    <td class="fc-event-container"><a
                                                        class="fc-day-grid-event fc-h-event fc-event fc-start fc-end fc-draggable">
                                                        <div class="fc-content"><span class="fc-time">12p</span> <span
                                                            class="fc-title">Lunch</span></div>
                                                      </a></td>
                                                  </tr>
                                                  <tr class="fc-limited">
                                                    <td class="fc-event-container"><a
                                                        class="fc-day-grid-event fc-h-event fc-event fc-start fc-end fc-draggable">
                                                        <div class="fc-content"><span class="fc-time">2:30p</span> <span
                                                            class="fc-title">Meeting</span></div>
                                                      </a></td>
                                                  </tr>
                                                  <tr class="fc-limited">
                                                    <td class="fc-event-container"><a
                                                        class="fc-day-grid-event fc-h-event fc-event fc-start fc-end fc-draggable">
                                                        <div class="fc-content"><span class="fc-time">5:30p</span> <span
                                                            class="fc-title">Happy Hour</span></div>
                                                      </a></td>
                                                  </tr>
                                                  <tr class="fc-limited">
                                                    <td class="fc-event-container"><a
                                                        class="fc-day-grid-event fc-h-event fc-event fc-start fc-end fc-draggable">
                                                        <div class="fc-content"><span class="fc-time">8p</span> <span
                                                            class="fc-title">Dinner</span></div>
                                                      </a></td>
                                                  </tr>
                                                </tbody>
                                              </table>
                                            </div>
                                          </div>
                                          <div class="fc-row fc-week fc-widget-content fc-rigid" style="height: 114px;">
                                            <div class="fc-bg">
                                              <table class="">
                                                <tbody>
                                                  <tr>
                                                    <td class="fc-day fc-widget-content fc-sun fc-past"
                                                      data-date="2016-06-19"></td>
                                                    <td class="fc-day fc-widget-content fc-mon fc-past"
                                                      data-date="2016-06-20"></td>
                                                    <td class="fc-day fc-widget-content fc-tue fc-past"
                                                      data-date="2016-06-21"></td>
                                                    <td class="fc-day fc-widget-content fc-wed fc-past"
                                                      data-date="2016-06-22"></td>
                                                    <td class="fc-day fc-widget-content fc-thu fc-past"
                                                      data-date="2016-06-23"></td>
                                                    <td class="fc-day fc-widget-content fc-fri fc-past"
                                                      data-date="2016-06-24"></td>
                                                    <td class="fc-day fc-widget-content fc-sat fc-past"
                                                      data-date="2016-06-25"></td>
                                                  </tr>
                                                </tbody>
                                              </table>
                                            </div>
                                            <div class="fc-content-skeleton">
                                              <table>
                                                <thead>
                                                  <tr>
                                                    <td class="fc-day-top fc-sun fc-past" data-date="2016-06-19"><span
                                                        class="fc-day-number">19</span></td>
                                                    <td class="fc-day-top fc-mon fc-past" data-date="2016-06-20"><span
                                                        class="fc-day-number">20</span></td>
                                                    <td class="fc-day-top fc-tue fc-past" data-date="2016-06-21"><span
                                                        class="fc-day-number">21</span></td>
                                                    <td class="fc-day-top fc-wed fc-past" data-date="2016-06-22"><span
                                                        class="fc-day-number">22</span></td>
                                                    <td class="fc-day-top fc-thu fc-past" data-date="2016-06-23"><span
                                                        class="fc-day-number">23</span></td>
                                                    <td class="fc-day-top fc-fri fc-past" data-date="2016-06-24"><span
                                                        class="fc-day-number">24</span></td>
                                                    <td class="fc-day-top fc-sat fc-past" data-date="2016-06-25"><span
                                                        class="fc-day-number">25</span></td>
                                                  </tr>
                                                </thead>
                                                <tbody>
                                                  <tr>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                  </tr>
                                                </tbody>
                                              </table>
                                            </div>
                                          </div>
                                          <div class="fc-row fc-week fc-widget-content fc-rigid" style="height: 114px;">
                                            <div class="fc-bg">
                                              <table class="">
                                                <tbody>
                                                  <tr>
                                                    <td class="fc-day fc-widget-content fc-sun fc-past"
                                                      data-date="2016-06-26"></td>
                                                    <td class="fc-day fc-widget-content fc-mon fc-past"
                                                      data-date="2016-06-27"></td>
                                                    <td class="fc-day fc-widget-content fc-tue fc-past"
                                                      data-date="2016-06-28"></td>
                                                    <td class="fc-day fc-widget-content fc-wed fc-past"
                                                      data-date="2016-06-29"></td>
                                                    <td class="fc-day fc-widget-content fc-thu fc-past"
                                                      data-date="2016-06-30"></td>
                                                    <td class="fc-day fc-widget-content fc-fri fc-other-month fc-past"
                                                      data-date="2016-07-01"></td>
                                                    <td class="fc-day fc-widget-content fc-sat fc-other-month fc-past"
                                                      data-date="2016-07-02"></td>
                                                  </tr>
                                                </tbody>
                                              </table>
                                            </div>
                                            <div class="fc-content-skeleton">
                                              <table>
                                                <thead>
                                                  <tr>
                                                    <td class="fc-day-top fc-sun fc-past" data-date="2016-06-26"><span
                                                        class="fc-day-number">26</span></td>
                                                    <td class="fc-day-top fc-mon fc-past" data-date="2016-06-27"><span
                                                        class="fc-day-number">27</span></td>
                                                    <td class="fc-day-top fc-tue fc-past" data-date="2016-06-28"><span
                                                        class="fc-day-number">28</span></td>
                                                    <td class="fc-day-top fc-wed fc-past" data-date="2016-06-29"><span
                                                        class="fc-day-number">29</span></td>
                                                    <td class="fc-day-top fc-thu fc-past" data-date="2016-06-30"><span
                                                        class="fc-day-number">30</span></td>
                                                    <td class="fc-day-top fc-fri fc-other-month fc-past"
                                                      data-date="2016-07-01"><span class="fc-day-number">1</span></td>
                                                    <td class="fc-day-top fc-sat fc-other-month fc-past"
                                                      data-date="2016-07-02"><span class="fc-day-number">2</span></td>
                                                  </tr>
                                                </thead>
                                                <tbody>
                                                  <tr>
                                                    <td></td>
                                                    <td></td>
                                                    <td class="fc-event-container"><a
                                                        class="fc-day-grid-event fc-h-event fc-event fc-start fc-end fc-draggable fc-resizable"
                                                        href="http://google.com/">
                                                        <div class="fc-content"> <span class="fc-title">Click for
                                                            Google</span></div>
                                                        <div class="fc-resizer fc-end-resizer"></div>
                                                      </a></td>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                  </tr>
                                                </tbody>
                                              </table>
                                            </div>
                                          </div>
                                          <div class="fc-row fc-week fc-widget-content fc-rigid" style="height: 117px;">
                                            <div class="fc-bg">
                                              <table class="">
                                                <tbody>
                                                  <tr>
                                                    <td class="fc-day fc-widget-content fc-sun fc-other-month fc-past"
                                                      data-date="2016-07-03"></td>
                                                    <td class="fc-day fc-widget-content fc-mon fc-other-month fc-past"
                                                      data-date="2016-07-04"></td>
                                                    <td class="fc-day fc-widget-content fc-tue fc-other-month fc-past"
                                                      data-date="2016-07-05"></td>
                                                    <td class="fc-day fc-widget-content fc-wed fc-other-month fc-past"
                                                      data-date="2016-07-06"></td>
                                                    <td class="fc-day fc-widget-content fc-thu fc-other-month fc-past"
                                                      data-date="2016-07-07"></td>
                                                    <td class="fc-day fc-widget-content fc-fri fc-other-month fc-past"
                                                      data-date="2016-07-08"></td>
                                                    <td class="fc-day fc-widget-content fc-sat fc-other-month fc-past"
                                                      data-date="2016-07-09"></td>
                                                  </tr>
                                                </tbody>
                                              </table>
                                            </div>
                                            <div class="fc-content-skeleton">
                                              <table>
                                                <thead>
                                                  <tr>
                                                    <td class="fc-day-top fc-sun fc-other-month fc-past"
                                                      data-date="2016-07-03"><span class="fc-day-number">3</span></td>
                                                    <td class="fc-day-top fc-mon fc-other-month fc-past"
                                                      data-date="2016-07-04"><span class="fc-day-number">4</span></td>
                                                    <td class="fc-day-top fc-tue fc-other-month fc-past"
                                                      data-date="2016-07-05"><span class="fc-day-number">5</span></td>
                                                    <td class="fc-day-top fc-wed fc-other-month fc-past"
                                                      data-date="2016-07-06"><span class="fc-day-number">6</span></td>
                                                    <td class="fc-day-top fc-thu fc-other-month fc-past"
                                                      data-date="2016-07-07"><span class="fc-day-number">7</span></td>
                                                    <td class="fc-day-top fc-fri fc-other-month fc-past"
                                                      data-date="2016-07-08"><span class="fc-day-number">8</span></td>
                                                    <td class="fc-day-top fc-sat fc-other-month fc-past"
                                                      data-date="2016-07-09"><span class="fc-day-number">9</span></td>
                                                  </tr>
                                                </thead>
                                                <tbody>
                                                  <tr>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                  </tr>
                                                </tbody>
                                              </table>
                                            </div>
                                          </div>
                                        </div>
                                      </div>
                                    </td>
                                  </tr>
                                </tbody>
                              </table>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>

              <div class="row">
                <div class="col-12">
                  <div class="card">
                    <div class="card-header">
                      <h4 class="card-title">Basic Views</h4>
                      <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
                      <div class="heading-elements">
                        <ul class="list-inline mb-0">
                          <li><a data-action="collapse"><i class="ft-minus"></i></a></li>
                          <li><a data-action="reload"><i class="ft-rotate-cw"></i></a></li>
                          <li><a data-action="close"><i class="ft-x"></i></a></li>
                        </ul>
                      </div>
                    </div>
                    <div class="card-content collapse show">
                      <div class="card-body">
                        <p class="card-text">This is the most basic example having navigation buttons as well as month,
                          week and day views. In this example you have the option to change your view to a basicWeek or
                          basicDay view. In the Basic Week or Basic Day View events are listed all together.</p>
                        <div id="fc-basic-views" class="fc fc-unthemed fc-ltr">
                          <div class="fc-toolbar fc-header-toolbar">
                            <div class="fc-left">
                              <div class="fc-button-group"><button type="button"
                                  class="fc-prev-button fc-button fc-state-default fc-corner-left"
                                  aria-label="prev"><span
                                    class="fc-icon fc-icon-left-single-arrow"></span></button><button type="button"
                                  class="fc-next-button fc-button fc-state-default fc-corner-right"
                                  aria-label="next"><span class="fc-icon fc-icon-right-single-arrow"></span></button>
                              </div><button type="button"
                                class="fc-today-button fc-button fc-state-default fc-corner-left fc-corner-right">today</button>
                            </div>
                            <div class="fc-right">
                              <div class="fc-button-group"><button type="button"
                                  class="fc-month-button fc-button fc-state-default fc-corner-left fc-state-active">month</button><button
                                  type="button"
                                  class="fc-basicWeek-button fc-button fc-state-default">week</button><button
                                  type="button"
                                  class="fc-basicDay-button fc-button fc-state-default fc-corner-right">day</button>
                              </div>
                            </div>
                            <div class="fc-center">
                              <h2>June 2016</h2>
                            </div>
                            <div class="fc-clear"></div>
                          </div>
                          <div class="fc-view-container" style="">
                            <div class="fc-view fc-month-view fc-basic-view" style="">
                              <table class="">
                                <thead class="fc-head">
                                  <tr>
                                    <td class="fc-head-container fc-widget-header">
                                      <div class="fc-row fc-widget-header">
                                        <table class="">
                                          <thead>
                                            <tr>
                                              <th class="fc-day-header fc-widget-header fc-sun"><span>Sun</span></th>
                                              <th class="fc-day-header fc-widget-header fc-mon"><span>Mon</span></th>
                                              <th class="fc-day-header fc-widget-header fc-tue"><span>Tue</span></th>
                                              <th class="fc-day-header fc-widget-header fc-wed"><span>Wed</span></th>
                                              <th class="fc-day-header fc-widget-header fc-thu"><span>Thu</span></th>
                                              <th class="fc-day-header fc-widget-header fc-fri"><span>Fri</span></th>
                                              <th class="fc-day-header fc-widget-header fc-sat"><span>Sat</span></th>
                                            </tr>
                                          </thead>
                                        </table>
                                      </div>
                                    </td>
                                  </tr>
                                </thead>
                                <tbody class="fc-body">
                                  <tr>
                                    <td class="fc-widget-content">
                                      <div class="fc-scroller fc-day-grid-container"
                                        style="overflow: hidden; height: 687px;">
                                        <div class="fc-day-grid fc-unselectable">
                                          <div class="fc-row fc-week fc-widget-content fc-rigid" style="height: 114px;">
                                            <div class="fc-bg">
                                              <table class="">
                                                <tbody>
                                                  <tr>
                                                    <td class="fc-day fc-widget-content fc-sun fc-other-month fc-past"
                                                      data-date="2016-05-29"></td>
                                                    <td class="fc-day fc-widget-content fc-mon fc-other-month fc-past"
                                                      data-date="2016-05-30"></td>
                                                    <td class="fc-day fc-widget-content fc-tue fc-other-month fc-past"
                                                      data-date="2016-05-31"></td>
                                                    <td class="fc-day fc-widget-content fc-wed fc-past"
                                                      data-date="2016-06-01"></td>
                                                    <td class="fc-day fc-widget-content fc-thu fc-past"
                                                      data-date="2016-06-02"></td>
                                                    <td class="fc-day fc-widget-content fc-fri fc-past"
                                                      data-date="2016-06-03"></td>
                                                    <td class="fc-day fc-widget-content fc-sat fc-past"
                                                      data-date="2016-06-04"></td>
                                                  </tr>
                                                </tbody>
                                              </table>
                                            </div>
                                            <div class="fc-content-skeleton">
                                              <table>
                                                <thead>
                                                  <tr>
                                                    <td class="fc-day-top fc-sun fc-other-month fc-past"
                                                      data-date="2016-05-29"><span class="fc-day-number">29</span></td>
                                                    <td class="fc-day-top fc-mon fc-other-month fc-past"
                                                      data-date="2016-05-30"><span class="fc-day-number">30</span></td>
                                                    <td class="fc-day-top fc-tue fc-other-month fc-past"
                                                      data-date="2016-05-31"><span class="fc-day-number">31</span></td>
                                                    <td class="fc-day-top fc-wed fc-past" data-date="2016-06-01"><span
                                                        class="fc-day-number">1</span></td>
                                                    <td class="fc-day-top fc-thu fc-past" data-date="2016-06-02"><span
                                                        class="fc-day-number">2</span></td>
                                                    <td class="fc-day-top fc-fri fc-past" data-date="2016-06-03"><span
                                                        class="fc-day-number">3</span></td>
                                                    <td class="fc-day-top fc-sat fc-past" data-date="2016-06-04"><span
                                                        class="fc-day-number">4</span></td>
                                                  </tr>
                                                </thead>
                                                <tbody>
                                                  <tr>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                    <td class="fc-event-container"><a
                                                        class="fc-day-grid-event fc-h-event fc-event fc-start fc-end fc-draggable fc-resizable">
                                                        <div class="fc-content"> <span class="fc-title">All Day
                                                            Event</span></div>
                                                        <div class="fc-resizer fc-end-resizer"></div>
                                                      </a></td>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                  </tr>
                                                </tbody>
                                              </table>
                                            </div>
                                          </div>
                                          <div class="fc-row fc-week fc-widget-content fc-rigid" style="height: 114px;">
                                            <div class="fc-bg">
                                              <table class="">
                                                <tbody>
                                                  <tr>
                                                    <td class="fc-day fc-widget-content fc-sun fc-past"
                                                      data-date="2016-06-05"></td>
                                                    <td class="fc-day fc-widget-content fc-mon fc-past"
                                                      data-date="2016-06-06"></td>
                                                    <td class="fc-day fc-widget-content fc-tue fc-past"
                                                      data-date="2016-06-07"></td>
                                                    <td class="fc-day fc-widget-content fc-wed fc-past"
                                                      data-date="2016-06-08"></td>
                                                    <td class="fc-day fc-widget-content fc-thu fc-past"
                                                      data-date="2016-06-09"></td>
                                                    <td class="fc-day fc-widget-content fc-fri fc-past"
                                                      data-date="2016-06-10"></td>
                                                    <td class="fc-day fc-widget-content fc-sat fc-past"
                                                      data-date="2016-06-11"></td>
                                                  </tr>
                                                </tbody>
                                              </table>
                                            </div>
                                            <div class="fc-content-skeleton">
                                              <table>
                                                <thead>
                                                  <tr>
                                                    <td class="fc-day-top fc-sun fc-past" data-date="2016-06-05"><span
                                                        class="fc-day-number">5</span></td>
                                                    <td class="fc-day-top fc-mon fc-past" data-date="2016-06-06"><span
                                                        class="fc-day-number">6</span></td>
                                                    <td class="fc-day-top fc-tue fc-past" data-date="2016-06-07"><span
                                                        class="fc-day-number">7</span></td>
                                                    <td class="fc-day-top fc-wed fc-past" data-date="2016-06-08"><span
                                                        class="fc-day-number">8</span></td>
                                                    <td class="fc-day-top fc-thu fc-past" data-date="2016-06-09"><span
                                                        class="fc-day-number">9</span></td>
                                                    <td class="fc-day-top fc-fri fc-past" data-date="2016-06-10"><span
                                                        class="fc-day-number">10</span></td>
                                                    <td class="fc-day-top fc-sat fc-past" data-date="2016-06-11"><span
                                                        class="fc-day-number">11</span></td>
                                                  </tr>
                                                </thead>
                                                <tbody>
                                                  <tr>
                                                    <td rowspan="2"></td>
                                                    <td rowspan="2"></td>
                                                    <td class="fc-event-container" colspan="3"><a
                                                        class="fc-day-grid-event fc-h-event fc-event fc-start fc-end fc-draggable fc-resizable">
                                                        <div class="fc-content"> <span class="fc-title">Long
                                                            Event</span>
                                                        </div>
                                                        <div class="fc-resizer fc-end-resizer"></div>
                                                      </a></td>
                                                    <td rowspan="2"></td>
                                                    <td class="fc-event-container" rowspan="2"><a
                                                        class="fc-day-grid-event fc-h-event fc-event fc-start fc-not-end fc-draggable">
                                                        <div class="fc-content"> <span
                                                            class="fc-title">Conference</span>
                                                        </div>
                                                      </a></td>
                                                  </tr>
                                                  <tr>
                                                    <td></td>
                                                    <td></td>
                                                    <td class="fc-event-container"><a
                                                        class="fc-day-grid-event fc-h-event fc-event fc-start fc-end fc-draggable">
                                                        <div class="fc-content"><span class="fc-time">4p</span> <span
                                                            class="fc-title">Repeating Event</span></div>
                                                      </a></td>
                                                  </tr>
                                                </tbody>
                                              </table>
                                            </div>
                                          </div>
                                          <div class="fc-row fc-week fc-widget-content fc-rigid" style="height: 114px;">
                                            <div class="fc-bg">
                                              <table class="">
                                                <tbody>
                                                  <tr>
                                                    <td class="fc-day fc-widget-content fc-sun fc-past"
                                                      data-date="2016-06-12"></td>
                                                    <td class="fc-day fc-widget-content fc-mon fc-past"
                                                      data-date="2016-06-13"></td>
                                                    <td class="fc-day fc-widget-content fc-tue fc-past"
                                                      data-date="2016-06-14"></td>
                                                    <td class="fc-day fc-widget-content fc-wed fc-past"
                                                      data-date="2016-06-15"></td>
                                                    <td class="fc-day fc-widget-content fc-thu fc-past"
                                                      data-date="2016-06-16"></td>
                                                    <td class="fc-day fc-widget-content fc-fri fc-past"
                                                      data-date="2016-06-17"></td>
                                                    <td class="fc-day fc-widget-content fc-sat fc-past"
                                                      data-date="2016-06-18"></td>
                                                  </tr>
                                                </tbody>
                                              </table>
                                            </div>
                                            <div class="fc-content-skeleton">
                                              <table>
                                                <thead>
                                                  <tr>
                                                    <td class="fc-day-top fc-sun fc-past" data-date="2016-06-12"><span
                                                        class="fc-day-number">12</span></td>
                                                    <td class="fc-day-top fc-mon fc-past" data-date="2016-06-13"><span
                                                        class="fc-day-number">13</span></td>
                                                    <td class="fc-day-top fc-tue fc-past" data-date="2016-06-14"><span
                                                        class="fc-day-number">14</span></td>
                                                    <td class="fc-day-top fc-wed fc-past" data-date="2016-06-15"><span
                                                        class="fc-day-number">15</span></td>
                                                    <td class="fc-day-top fc-thu fc-past" data-date="2016-06-16"><span
                                                        class="fc-day-number">16</span></td>
                                                    <td class="fc-day-top fc-fri fc-past" data-date="2016-06-17"><span
                                                        class="fc-day-number">17</span></td>
                                                    <td class="fc-day-top fc-sat fc-past" data-date="2016-06-18"><span
                                                        class="fc-day-number">18</span></td>
                                                  </tr>
                                                </thead>
                                                <tbody>
                                                  <tr>
                                                    <td class="fc-event-container"><a
                                                        class="fc-day-grid-event fc-h-event fc-event fc-not-start fc-end fc-draggable fc-resizable">
                                                        <div class="fc-content"> <span
                                                            class="fc-title">Conference</span>
                                                        </div>
                                                        <div class="fc-resizer fc-end-resizer"></div>
                                                      </a></td>
                                                    <td class="fc-event-container" rowspan="6"><a
                                                        class="fc-day-grid-event fc-h-event fc-event fc-start fc-end fc-draggable">
                                                        <div class="fc-content"><span class="fc-time">7a</span> <span
                                                            class="fc-title">Birthday Party</span></div>
                                                      </a></td>
                                                    <td rowspan="6"></td>
                                                    <td rowspan="6"></td>
                                                    <td class="fc-event-container" rowspan="6"><a
                                                        class="fc-day-grid-event fc-h-event fc-event fc-start fc-end fc-draggable">
                                                        <div class="fc-content"><span class="fc-time">4p</span> <span
                                                            class="fc-title">Repeating Event</span></div>
                                                      </a></td>
                                                    <td rowspan="6"></td>
                                                    <td rowspan="6"></td>
                                                  </tr>
                                                  <tr>
                                                    <td class="fc-event-container fc-limited"><a
                                                        class="fc-day-grid-event fc-h-event fc-event fc-start fc-end fc-draggable">
                                                        <div class="fc-content"><span class="fc-time">10:30a</span>
                                                          <span class="fc-title">Meeting</span></div>
                                                      </a></td>
                                                    <td class="fc-more-cell" rowspan="1">
                                                      <div><a class="fc-more">+5 more</a></div>
                                                    </td>
                                                  </tr>
                                                  <tr class="fc-limited">
                                                    <td class="fc-event-container"><a
                                                        class="fc-day-grid-event fc-h-event fc-event fc-start fc-end fc-draggable">
                                                        <div class="fc-content"><span class="fc-time">12p</span> <span
                                                            class="fc-title">Lunch</span></div>
                                                      </a></td>
                                                  </tr>
                                                  <tr class="fc-limited">
                                                    <td class="fc-event-container"><a
                                                        class="fc-day-grid-event fc-h-event fc-event fc-start fc-end fc-draggable">
                                                        <div class="fc-content"><span class="fc-time">2:30p</span> <span
                                                            class="fc-title">Meeting</span></div>
                                                      </a></td>
                                                  </tr>
                                                  <tr class="fc-limited">
                                                    <td class="fc-event-container"><a
                                                        class="fc-day-grid-event fc-h-event fc-event fc-start fc-end fc-draggable">
                                                        <div class="fc-content"><span class="fc-time">5:30p</span> <span
                                                            class="fc-title">Happy Hour</span></div>
                                                      </a></td>
                                                  </tr>
                                                  <tr class="fc-limited">
                                                    <td class="fc-event-container"><a
                                                        class="fc-day-grid-event fc-h-event fc-event fc-start fc-end fc-draggable">
                                                        <div class="fc-content"><span class="fc-time">8p</span> <span
                                                            class="fc-title">Dinner</span></div>
                                                      </a></td>
                                                  </tr>
                                                </tbody>
                                              </table>
                                            </div>
                                          </div>
                                          <div class="fc-row fc-week fc-widget-content fc-rigid" style="height: 114px;">
                                            <div class="fc-bg">
                                              <table class="">
                                                <tbody>
                                                  <tr>
                                                    <td class="fc-day fc-widget-content fc-sun fc-past"
                                                      data-date="2016-06-19"></td>
                                                    <td class="fc-day fc-widget-content fc-mon fc-past"
                                                      data-date="2016-06-20"></td>
                                                    <td class="fc-day fc-widget-content fc-tue fc-past"
                                                      data-date="2016-06-21"></td>
                                                    <td class="fc-day fc-widget-content fc-wed fc-past"
                                                      data-date="2016-06-22"></td>
                                                    <td class="fc-day fc-widget-content fc-thu fc-past"
                                                      data-date="2016-06-23"></td>
                                                    <td class="fc-day fc-widget-content fc-fri fc-past"
                                                      data-date="2016-06-24"></td>
                                                    <td class="fc-day fc-widget-content fc-sat fc-past"
                                                      data-date="2016-06-25"></td>
                                                  </tr>
                                                </tbody>
                                              </table>
                                            </div>
                                            <div class="fc-content-skeleton">
                                              <table>
                                                <thead>
                                                  <tr>
                                                    <td class="fc-day-top fc-sun fc-past" data-date="2016-06-19"><span
                                                        class="fc-day-number">19</span></td>
                                                    <td class="fc-day-top fc-mon fc-past" data-date="2016-06-20"><span
                                                        class="fc-day-number">20</span></td>
                                                    <td class="fc-day-top fc-tue fc-past" data-date="2016-06-21"><span
                                                        class="fc-day-number">21</span></td>
                                                    <td class="fc-day-top fc-wed fc-past" data-date="2016-06-22"><span
                                                        class="fc-day-number">22</span></td>
                                                    <td class="fc-day-top fc-thu fc-past" data-date="2016-06-23"><span
                                                        class="fc-day-number">23</span></td>
                                                    <td class="fc-day-top fc-fri fc-past" data-date="2016-06-24"><span
                                                        class="fc-day-number">24</span></td>
                                                    <td class="fc-day-top fc-sat fc-past" data-date="2016-06-25"><span
                                                        class="fc-day-number">25</span></td>
                                                  </tr>
                                                </thead>
                                                <tbody>
                                                  <tr>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                  </tr>
                                                </tbody>
                                              </table>
                                            </div>
                                          </div>
                                          <div class="fc-row fc-week fc-widget-content fc-rigid" style="height: 114px;">
                                            <div class="fc-bg">
                                              <table class="">
                                                <tbody>
                                                  <tr>
                                                    <td class="fc-day fc-widget-content fc-sun fc-past"
                                                      data-date="2016-06-26"></td>
                                                    <td class="fc-day fc-widget-content fc-mon fc-past"
                                                      data-date="2016-06-27"></td>
                                                    <td class="fc-day fc-widget-content fc-tue fc-past"
                                                      data-date="2016-06-28"></td>
                                                    <td class="fc-day fc-widget-content fc-wed fc-past"
                                                      data-date="2016-06-29"></td>
                                                    <td class="fc-day fc-widget-content fc-thu fc-past"
                                                      data-date="2016-06-30"></td>
                                                    <td class="fc-day fc-widget-content fc-fri fc-other-month fc-past"
                                                      data-date="2016-07-01"></td>
                                                    <td class="fc-day fc-widget-content fc-sat fc-other-month fc-past"
                                                      data-date="2016-07-02"></td>
                                                  </tr>
                                                </tbody>
                                              </table>
                                            </div>
                                            <div class="fc-content-skeleton">
                                              <table>
                                                <thead>
                                                  <tr>
                                                    <td class="fc-day-top fc-sun fc-past" data-date="2016-06-26"><span
                                                        class="fc-day-number">26</span></td>
                                                    <td class="fc-day-top fc-mon fc-past" data-date="2016-06-27"><span
                                                        class="fc-day-number">27</span></td>
                                                    <td class="fc-day-top fc-tue fc-past" data-date="2016-06-28"><span
                                                        class="fc-day-number">28</span></td>
                                                    <td class="fc-day-top fc-wed fc-past" data-date="2016-06-29"><span
                                                        class="fc-day-number">29</span></td>
                                                    <td class="fc-day-top fc-thu fc-past" data-date="2016-06-30"><span
                                                        class="fc-day-number">30</span></td>
                                                    <td class="fc-day-top fc-fri fc-other-month fc-past"
                                                      data-date="2016-07-01"><span class="fc-day-number">1</span></td>
                                                    <td class="fc-day-top fc-sat fc-other-month fc-past"
                                                      data-date="2016-07-02"><span class="fc-day-number">2</span></td>
                                                  </tr>
                                                </thead>
                                                <tbody>
                                                  <tr>
                                                    <td></td>
                                                    <td></td>
                                                    <td class="fc-event-container"><a
                                                        class="fc-day-grid-event fc-h-event fc-event fc-start fc-end fc-draggable fc-resizable"
                                                        href="http://google.com/">
                                                        <div class="fc-content"> <span class="fc-title">Click for
                                                            Google</span></div>
                                                        <div class="fc-resizer fc-end-resizer"></div>
                                                      </a></td>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                  </tr>
                                                </tbody>
                                              </table>
                                            </div>
                                          </div>
                                          <div class="fc-row fc-week fc-widget-content fc-rigid" style="height: 117px;">
                                            <div class="fc-bg">
                                              <table class="">
                                                <tbody>
                                                  <tr>
                                                    <td class="fc-day fc-widget-content fc-sun fc-other-month fc-past"
                                                      data-date="2016-07-03"></td>
                                                    <td class="fc-day fc-widget-content fc-mon fc-other-month fc-past"
                                                      data-date="2016-07-04"></td>
                                                    <td class="fc-day fc-widget-content fc-tue fc-other-month fc-past"
                                                      data-date="2016-07-05"></td>
                                                    <td class="fc-day fc-widget-content fc-wed fc-other-month fc-past"
                                                      data-date="2016-07-06"></td>
                                                    <td class="fc-day fc-widget-content fc-thu fc-other-month fc-past"
                                                      data-date="2016-07-07"></td>
                                                    <td class="fc-day fc-widget-content fc-fri fc-other-month fc-past"
                                                      data-date="2016-07-08"></td>
                                                    <td class="fc-day fc-widget-content fc-sat fc-other-month fc-past"
                                                      data-date="2016-07-09"></td>
                                                  </tr>
                                                </tbody>
                                              </table>
                                            </div>
                                            <div class="fc-content-skeleton">
                                              <table>
                                                <thead>
                                                  <tr>
                                                    <td class="fc-day-top fc-sun fc-other-month fc-past"
                                                      data-date="2016-07-03"><span class="fc-day-number">3</span></td>
                                                    <td class="fc-day-top fc-mon fc-other-month fc-past"
                                                      data-date="2016-07-04"><span class="fc-day-number">4</span></td>
                                                    <td class="fc-day-top fc-tue fc-other-month fc-past"
                                                      data-date="2016-07-05"><span class="fc-day-number">5</span></td>
                                                    <td class="fc-day-top fc-wed fc-other-month fc-past"
                                                      data-date="2016-07-06"><span class="fc-day-number">6</span></td>
                                                    <td class="fc-day-top fc-thu fc-other-month fc-past"
                                                      data-date="2016-07-07"><span class="fc-day-number">7</span></td>
                                                    <td class="fc-day-top fc-fri fc-other-month fc-past"
                                                      data-date="2016-07-08"><span class="fc-day-number">8</span></td>
                                                    <td class="fc-day-top fc-sat fc-other-month fc-past"
                                                      data-date="2016-07-09"><span class="fc-day-number">9</span></td>
                                                  </tr>
                                                </thead>
                                                <tbody>
                                                  <tr>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                  </tr>
                                                </tbody>
                                              </table>
                                            </div>
                                          </div>
                                        </div>
                                      </div>
                                    </td>
                                  </tr>
                                </tbody>
                              </table>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>

              <div class="row">
                <div class="col-12">
                  <div class="card">
                    <div class="card-header">
                      <h4 class="card-title">Agenda Views</h4>
                      <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
                      <div class="heading-elements">
                        <ul class="list-inline mb-0">
                          <li><a data-action="collapse"><i class="ft-minus"></i></a></li>
                          <li><a data-action="reload"><i class="ft-rotate-cw"></i></a></li>
                          <li><a data-action="close"><i class="ft-x"></i></a></li>
                        </ul>
                      </div>
                    </div>
                    <div class="card-content collapse show">
                      <div class="card-body">
                        <p class="card-text">FullCalendar has a number of different "views", or ways of displaying days
                          and events. The following 5 views are all built in to FullCalendar: <code>month, basicWeek,
                            basicDay, agendaWeek, agendaDay</code>. You can set the initial view of the calendar with
                          the
                          <code>defaultView</code> option. The following example demonstrates <code>agenda</code> views
                          and the <code>defaultView</code> option is set to <code>agendaWeek</code>.</p>
                        <div id="fc-agenda-views" class="fc fc-unthemed fc-ltr">
                          <div class="fc-toolbar fc-header-toolbar">
                            <div class="fc-left">
                              <div class="fc-button-group"><button type="button"
                                  class="fc-prev-button fc-button fc-state-default fc-corner-left"
                                  aria-label="prev"><span
                                    class="fc-icon fc-icon-left-single-arrow"></span></button><button type="button"
                                  class="fc-next-button fc-button fc-state-default fc-corner-right"
                                  aria-label="next"><span class="fc-icon fc-icon-right-single-arrow"></span></button>
                              </div><button type="button"
                                class="fc-today-button fc-button fc-state-default fc-corner-left fc-corner-right">today</button>
                            </div>
                            <div class="fc-right">
                              <div class="fc-button-group"><button type="button"
                                  class="fc-month-button fc-button fc-state-default fc-corner-left">month</button><button
                                  type="button"
                                  class="fc-agendaWeek-button fc-button fc-state-default fc-state-active">week</button><button
                                  type="button"
                                  class="fc-agendaDay-button fc-button fc-state-default fc-corner-right">day</button>
                              </div>
                            </div>
                            <div class="fc-center">
                              <h2>Jun 12 – 18, 2016</h2>
                            </div>
                            <div class="fc-clear"></div>
                          </div>
                          <div class="fc-view-container" style="">
                            <div class="fc-view fc-agendaWeek-view fc-agenda-view" style="">
                              <table class="">
                                <thead class="fc-head">
                                  <tr>
                                    <td class="fc-head-container fc-widget-header">
                                      <div class="fc-row fc-widget-header"
                                        style="border-right-width: 1px; margin-right: 16px;">
                                        <table class="">
                                          <thead>
                                            <tr>
                                              <th class="fc-axis fc-widget-header" style="width: 44px;"></th>
                                              <th class="fc-day-header fc-widget-header fc-sun fc-past"
                                                data-date="2016-06-12"><span>Sun 6/12</span></th>
                                              <th class="fc-day-header fc-widget-header fc-mon fc-past"
                                                data-date="2016-06-13"><span>Mon 6/13</span></th>
                                              <th class="fc-day-header fc-widget-header fc-tue fc-past"
                                                data-date="2016-06-14"><span>Tue 6/14</span></th>
                                              <th class="fc-day-header fc-widget-header fc-wed fc-past"
                                                data-date="2016-06-15"><span>Wed 6/15</span></th>
                                              <th class="fc-day-header fc-widget-header fc-thu fc-past"
                                                data-date="2016-06-16"><span>Thu 6/16</span></th>
                                              <th class="fc-day-header fc-widget-header fc-fri fc-past"
                                                data-date="2016-06-17"><span>Fri 6/17</span></th>
                                              <th class="fc-day-header fc-widget-header fc-sat fc-past"
                                                data-date="2016-06-18"><span>Sat 6/18</span></th>
                                            </tr>
                                          </thead>
                                        </table>
                                      </div>
                                    </td>
                                  </tr>
                                </thead>
                                <tbody class="fc-body">
                                  <tr>
                                    <td class="fc-widget-content">
                                      <div class="fc-day-grid fc-unselectable">
                                        <div class="fc-row fc-week fc-widget-content"
                                          style="border-right-width: 1px; margin-right: 16px;">
                                          <div class="fc-bg">
                                            <table class="">
                                              <tbody>
                                                <tr>
                                                  <td class="fc-axis fc-widget-content" style="width: 44px;">
                                                    <span>all-day</span></td>
                                                  <td class="fc-day fc-widget-content fc-sun fc-past"
                                                    data-date="2016-06-12"></td>
                                                  <td class="fc-day fc-widget-content fc-mon fc-past"
                                                    data-date="2016-06-13"></td>
                                                  <td class="fc-day fc-widget-content fc-tue fc-past"
                                                    data-date="2016-06-14"></td>
                                                  <td class="fc-day fc-widget-content fc-wed fc-past"
                                                    data-date="2016-06-15"></td>
                                                  <td class="fc-day fc-widget-content fc-thu fc-past"
                                                    data-date="2016-06-16"></td>
                                                  <td class="fc-day fc-widget-content fc-fri fc-past"
                                                    data-date="2016-06-17"></td>
                                                  <td class="fc-day fc-widget-content fc-sat fc-past"
                                                    data-date="2016-06-18"></td>
                                                </tr>
                                              </tbody>
                                            </table>
                                          </div>
                                          <div class="fc-content-skeleton">
                                            <table>
                                              <tbody>
                                                <tr>
                                                  <td class="fc-axis" style="width: 44px;"></td>
                                                  <td class="fc-event-container"><a
                                                      class="fc-day-grid-event fc-h-event fc-event fc-not-start fc-end fc-draggable fc-resizable">
                                                      <div class="fc-content"> <span class="fc-title">Conference</span>
                                                      </div>
                                                      <div class="fc-resizer fc-end-resizer"></div>
                                                    </a></td>
                                                  <td></td>
                                                  <td></td>
                                                  <td></td>
                                                  <td></td>
                                                  <td></td>
                                                  <td></td>
                                                </tr>
                                              </tbody>
                                            </table>
                                          </div>
                                        </div>
                                      </div>
                                      <hr class="fc-divider fc-widget-header">
                                      <div class="fc-scroller fc-time-grid-container"
                                        style="overflow: hidden scroll; height: 632px;">
                                        <div class="fc-time-grid fc-unselectable">
                                          <div class="fc-bg">
                                            <table class="">
                                              <tbody>
                                                <tr>
                                                  <td class="fc-axis fc-widget-content" style="width: 44px;"></td>
                                                  <td class="fc-day fc-widget-content fc-sun fc-past"
                                                    data-date="2016-06-12"></td>
                                                  <td class="fc-day fc-widget-content fc-mon fc-past"
                                                    data-date="2016-06-13"></td>
                                                  <td class="fc-day fc-widget-content fc-tue fc-past"
                                                    data-date="2016-06-14"></td>
                                                  <td class="fc-day fc-widget-content fc-wed fc-past"
                                                    data-date="2016-06-15"></td>
                                                  <td class="fc-day fc-widget-content fc-thu fc-past"
                                                    data-date="2016-06-16"></td>
                                                  <td class="fc-day fc-widget-content fc-fri fc-past"
                                                    data-date="2016-06-17"></td>
                                                  <td class="fc-day fc-widget-content fc-sat fc-past"
                                                    data-date="2016-06-18"></td>
                                                </tr>
                                              </tbody>
                                            </table>
                                          </div>
                                          <div class="fc-slats">
                                            <table class="">
                                              <tbody>
                                                <tr data-time="00:00:00">
                                                  <td class="fc-axis fc-time fc-widget-content" style="width: 44px;">
                                                    <span>12am</span></td>
                                                  <td class="fc-widget-content"></td>
                                                </tr>
                                                <tr data-time="00:30:00" class="fc-minor">
                                                  <td class="fc-axis fc-time fc-widget-content" style="width: 44px;">
                                                  </td>
                                                  <td class="fc-widget-content"></td>
                                                </tr>
                                                <tr data-time="01:00:00">
                                                  <td class="fc-axis fc-time fc-widget-content" style="width: 44px;">
                                                    <span>1am</span></td>
                                                  <td class="fc-widget-content"></td>
                                                </tr>
                                                <tr data-time="01:30:00" class="fc-minor">
                                                  <td class="fc-axis fc-time fc-widget-content" style="width: 44px;">
                                                  </td>
                                                  <td class="fc-widget-content"></td>
                                                </tr>
                                                <tr data-time="02:00:00">
                                                  <td class="fc-axis fc-time fc-widget-content" style="width: 44px;">
                                                    <span>2am</span></td>
                                                  <td class="fc-widget-content"></td>
                                                </tr>
                                                <tr data-time="02:30:00" class="fc-minor">
                                                  <td class="fc-axis fc-time fc-widget-content" style="width: 44px;">
                                                  </td>
                                                  <td class="fc-widget-content"></td>
                                                </tr>
                                                <tr data-time="03:00:00">
                                                  <td class="fc-axis fc-time fc-widget-content" style="width: 44px;">
                                                    <span>3am</span></td>
                                                  <td class="fc-widget-content"></td>
                                                </tr>
                                                <tr data-time="03:30:00" class="fc-minor">
                                                  <td class="fc-axis fc-time fc-widget-content" style="width: 44px;">
                                                  </td>
                                                  <td class="fc-widget-content"></td>
                                                </tr>
                                                <tr data-time="04:00:00">
                                                  <td class="fc-axis fc-time fc-widget-content" style="width: 44px;">
                                                    <span>4am</span></td>
                                                  <td class="fc-widget-content"></td>
                                                </tr>
                                                <tr data-time="04:30:00" class="fc-minor">
                                                  <td class="fc-axis fc-time fc-widget-content" style="width: 44px;">
                                                  </td>
                                                  <td class="fc-widget-content"></td>
                                                </tr>
                                                <tr data-time="05:00:00">
                                                  <td class="fc-axis fc-time fc-widget-content" style="width: 44px;">
                                                    <span>5am</span></td>
                                                  <td class="fc-widget-content"></td>
                                                </tr>
                                                <tr data-time="05:30:00" class="fc-minor">
                                                  <td class="fc-axis fc-time fc-widget-content" style="width: 44px;">
                                                  </td>
                                                  <td class="fc-widget-content"></td>
                                                </tr>
                                                <tr data-time="06:00:00">
                                                  <td class="fc-axis fc-time fc-widget-content" style="width: 44px;">
                                                    <span>6am</span></td>
                                                  <td class="fc-widget-content"></td>
                                                </tr>
                                                <tr data-time="06:30:00" class="fc-minor">
                                                  <td class="fc-axis fc-time fc-widget-content" style="width: 44px;">
                                                  </td>
                                                  <td class="fc-widget-content"></td>
                                                </tr>
                                                <tr data-time="07:00:00">
                                                  <td class="fc-axis fc-time fc-widget-content" style="width: 44px;">
                                                    <span>7am</span></td>
                                                  <td class="fc-widget-content"></td>
                                                </tr>
                                                <tr data-time="07:30:00" class="fc-minor">
                                                  <td class="fc-axis fc-time fc-widget-content" style="width: 44px;">
                                                  </td>
                                                  <td class="fc-widget-content"></td>
                                                </tr>
                                                <tr data-time="08:00:00">
                                                  <td class="fc-axis fc-time fc-widget-content" style="width: 44px;">
                                                    <span>8am</span></td>
                                                  <td class="fc-widget-content"></td>
                                                </tr>
                                                <tr data-time="08:30:00" class="fc-minor">
                                                  <td class="fc-axis fc-time fc-widget-content" style="width: 44px;">
                                                  </td>
                                                  <td class="fc-widget-content"></td>
                                                </tr>
                                                <tr data-time="09:00:00">
                                                  <td class="fc-axis fc-time fc-widget-content" style="width: 44px;">
                                                    <span>9am</span></td>
                                                  <td class="fc-widget-content"></td>
                                                </tr>
                                                <tr data-time="09:30:00" class="fc-minor">
                                                  <td class="fc-axis fc-time fc-widget-content" style="width: 44px;">
                                                  </td>
                                                  <td class="fc-widget-content"></td>
                                                </tr>
                                                <tr data-time="10:00:00">
                                                  <td class="fc-axis fc-time fc-widget-content" style="width: 44px;">
                                                    <span>10am</span></td>
                                                  <td class="fc-widget-content"></td>
                                                </tr>
                                                <tr data-time="10:30:00" class="fc-minor">
                                                  <td class="fc-axis fc-time fc-widget-content" style="width: 44px;">
                                                  </td>
                                                  <td class="fc-widget-content"></td>
                                                </tr>
                                                <tr data-time="11:00:00">
                                                  <td class="fc-axis fc-time fc-widget-content" style="width: 44px;">
                                                    <span>11am</span></td>
                                                  <td class="fc-widget-content"></td>
                                                </tr>
                                                <tr data-time="11:30:00" class="fc-minor">
                                                  <td class="fc-axis fc-time fc-widget-content" style="width: 44px;">
                                                  </td>
                                                  <td class="fc-widget-content"></td>
                                                </tr>
                                                <tr data-time="12:00:00">
                                                  <td class="fc-axis fc-time fc-widget-content" style="width: 44px;">
                                                    <span>12pm</span></td>
                                                  <td class="fc-widget-content"></td>
                                                </tr>
                                                <tr data-time="12:30:00" class="fc-minor">
                                                  <td class="fc-axis fc-time fc-widget-content" style="width: 44px;">
                                                  </td>
                                                  <td class="fc-widget-content"></td>
                                                </tr>
                                                <tr data-time="13:00:00">
                                                  <td class="fc-axis fc-time fc-widget-content" style="width: 44px;">
                                                    <span>1pm</span></td>
                                                  <td class="fc-widget-content"></td>
                                                </tr>
                                                <tr data-time="13:30:00" class="fc-minor">
                                                  <td class="fc-axis fc-time fc-widget-content" style="width: 44px;">
                                                  </td>
                                                  <td class="fc-widget-content"></td>
                                                </tr>
                                                <tr data-time="14:00:00">
                                                  <td class="fc-axis fc-time fc-widget-content" style="width: 44px;">
                                                    <span>2pm</span></td>
                                                  <td class="fc-widget-content"></td>
                                                </tr>
                                                <tr data-time="14:30:00" class="fc-minor">
                                                  <td class="fc-axis fc-time fc-widget-content" style="width: 44px;">
                                                  </td>
                                                  <td class="fc-widget-content"></td>
                                                </tr>
                                                <tr data-time="15:00:00">
                                                  <td class="fc-axis fc-time fc-widget-content" style="width: 44px;">
                                                    <span>3pm</span></td>
                                                  <td class="fc-widget-content"></td>
                                                </tr>
                                                <tr data-time="15:30:00" class="fc-minor">
                                                  <td class="fc-axis fc-time fc-widget-content" style="width: 44px;">
                                                  </td>
                                                  <td class="fc-widget-content"></td>
                                                </tr>
                                                <tr data-time="16:00:00">
                                                  <td class="fc-axis fc-time fc-widget-content" style="width: 44px;">
                                                    <span>4pm</span></td>
                                                  <td class="fc-widget-content"></td>
                                                </tr>
                                                <tr data-time="16:30:00" class="fc-minor">
                                                  <td class="fc-axis fc-time fc-widget-content" style="width: 44px;">
                                                  </td>
                                                  <td class="fc-widget-content"></td>
                                                </tr>
                                                <tr data-time="17:00:00">
                                                  <td class="fc-axis fc-time fc-widget-content" style="width: 44px;">
                                                    <span>5pm</span></td>
                                                  <td class="fc-widget-content"></td>
                                                </tr>
                                                <tr data-time="17:30:00" class="fc-minor">
                                                  <td class="fc-axis fc-time fc-widget-content" style="width: 44px;">
                                                  </td>
                                                  <td class="fc-widget-content"></td>
                                                </tr>
                                                <tr data-time="18:00:00">
                                                  <td class="fc-axis fc-time fc-widget-content" style="width: 44px;">
                                                    <span>6pm</span></td>
                                                  <td class="fc-widget-content"></td>
                                                </tr>
                                                <tr data-time="18:30:00" class="fc-minor">
                                                  <td class="fc-axis fc-time fc-widget-content" style="width: 44px;">
                                                  </td>
                                                  <td class="fc-widget-content"></td>
                                                </tr>
                                                <tr data-time="19:00:00">
                                                  <td class="fc-axis fc-time fc-widget-content" style="width: 44px;">
                                                    <span>7pm</span></td>
                                                  <td class="fc-widget-content"></td>
                                                </tr>
                                                <tr data-time="19:30:00" class="fc-minor">
                                                  <td class="fc-axis fc-time fc-widget-content" style="width: 44px;">
                                                  </td>
                                                  <td class="fc-widget-content"></td>
                                                </tr>
                                                <tr data-time="20:00:00">
                                                  <td class="fc-axis fc-time fc-widget-content" style="width: 44px;">
                                                    <span>8pm</span></td>
                                                  <td class="fc-widget-content"></td>
                                                </tr>
                                                <tr data-time="20:30:00" class="fc-minor">
                                                  <td class="fc-axis fc-time fc-widget-content" style="width: 44px;">
                                                  </td>
                                                  <td class="fc-widget-content"></td>
                                                </tr>
                                                <tr data-time="21:00:00">
                                                  <td class="fc-axis fc-time fc-widget-content" style="width: 44px;">
                                                    <span>9pm</span></td>
                                                  <td class="fc-widget-content"></td>
                                                </tr>
                                                <tr data-time="21:30:00" class="fc-minor">
                                                  <td class="fc-axis fc-time fc-widget-content" style="width: 44px;">
                                                  </td>
                                                  <td class="fc-widget-content"></td>
                                                </tr>
                                                <tr data-time="22:00:00">
                                                  <td class="fc-axis fc-time fc-widget-content" style="width: 44px;">
                                                    <span>10pm</span></td>
                                                  <td class="fc-widget-content"></td>
                                                </tr>
                                                <tr data-time="22:30:00" class="fc-minor">
                                                  <td class="fc-axis fc-time fc-widget-content" style="width: 44px;">
                                                  </td>
                                                  <td class="fc-widget-content"></td>
                                                </tr>
                                                <tr data-time="23:00:00">
                                                  <td class="fc-axis fc-time fc-widget-content" style="width: 44px;">
                                                    <span>11pm</span></td>
                                                  <td class="fc-widget-content"></td>
                                                </tr>
                                                <tr data-time="23:30:00" class="fc-minor">
                                                  <td class="fc-axis fc-time fc-widget-content" style="width: 44px;">
                                                  </td>
                                                  <td class="fc-widget-content"></td>
                                                </tr>
                                              </tbody>
                                            </table>
                                          </div>
                                          <hr class="fc-divider fc-widget-header" style="display:none">
                                          <div class="fc-content-skeleton">
                                            <table>
                                              <tbody>
                                                <tr>
                                                  <td class="fc-axis" style="width: 44px;"></td>
                                                  <td>
                                                    <div class="fc-content-col">
                                                      <div class="fc-event-container fc-helper-container"></div>
                                                      <div class="fc-event-container"><a
                                                          class="fc-time-grid-event fc-v-event fc-event fc-start fc-end fc-draggable fc-resizable"
                                                          style="top: 660px; bottom: -784px; z-index: 1; left: 0%; right: 0%; margin-right: 20px;">
                                                          <div class="fc-content">
                                                            <div class="fc-time" data-start="10:30"
                                                              data-full="10:30 AM - 12:30 PM"><span>10:30 - 12:30</span>
                                                            </div>
                                                            <div class="fc-title">Meeting</div>
                                                          </div>
                                                          <div class="fc-bg"></div>
                                                          <div class="fc-resizer fc-end-resizer"></div>
                                                        </a><a
                                                          class="fc-time-grid-event fc-v-event fc-event fc-start fc-end fc-draggable fc-resizable"
                                                          style="top: 743px; bottom: -867px; z-index: 2; left: 50%; right: 0%;">
                                                          <div class="fc-content">
                                                            <div class="fc-time" data-start="12:00"
                                                              data-full="12:00 PM">
                                                              <span>12:00</span></div>
                                                            <div class="fc-title">Lunch</div>
                                                          </div>
                                                          <div class="fc-bg"></div>
                                                          <div class="fc-resizer fc-end-resizer"></div>
                                                        </a><a
                                                          class="fc-time-grid-event fc-v-event fc-event fc-start fc-end fc-draggable fc-resizable"
                                                          style="top: 908px; bottom: -1032px; z-index: 1; left: 0%; right: 0%;">
                                                          <div class="fc-content">
                                                            <div class="fc-time" data-start="2:30" data-full="2:30 PM">
                                                              <span>2:30</span></div>
                                                            <div class="fc-title">Meeting</div>
                                                          </div>
                                                          <div class="fc-bg"></div>
                                                          <div class="fc-resizer fc-end-resizer"></div>
                                                        </a><a
                                                          class="fc-time-grid-event fc-v-event fc-event fc-start fc-end fc-draggable fc-resizable"
                                                          style="top: 1094px; bottom: -1218px; z-index: 1; left: 0%; right: 0%;">
                                                          <div class="fc-content">
                                                            <div class="fc-time" data-start="5:30" data-full="5:30 PM">
                                                              <span>5:30</span></div>
                                                            <div class="fc-title">Happy Hour</div>
                                                          </div>
                                                          <div class="fc-bg"></div>
                                                          <div class="fc-resizer fc-end-resizer"></div>
                                                        </a><a
                                                          class="fc-time-grid-event fc-v-event fc-event fc-start fc-end fc-draggable fc-resizable"
                                                          style="top: 1239px; bottom: -1363px; z-index: 1; left: 0%; right: 0%;">
                                                          <div class="fc-content">
                                                            <div class="fc-time" data-start="8:00" data-full="8:00 PM">
                                                              <span>8:00</span></div>
                                                            <div class="fc-title">Dinner</div>
                                                          </div>
                                                          <div class="fc-bg"></div>
                                                          <div class="fc-resizer fc-end-resizer"></div>
                                                        </a></div>
                                                      <div class="fc-highlight-container"></div>
                                                      <div class="fc-bgevent-container"></div>
                                                      <div class="fc-business-container"></div>
                                                    </div>
                                                  </td>
                                                  <td>
                                                    <div class="fc-content-col">
                                                      <div class="fc-event-container fc-helper-container"></div>
                                                      <div class="fc-event-container"><a
                                                          class="fc-time-grid-event fc-v-event fc-event fc-start fc-end fc-draggable fc-resizable"
                                                          style="top: 433px; bottom: -557px; z-index: 1; left: 0%; right: 0%;">
                                                          <div class="fc-content">
                                                            <div class="fc-time" data-start="7:00" data-full="7:00 AM">
                                                              <span>7:00</span></div>
                                                            <div class="fc-title">Birthday Party</div>
                                                          </div>
                                                          <div class="fc-bg"></div>
                                                          <div class="fc-resizer fc-end-resizer"></div>
                                                        </a></div>
                                                      <div class="fc-highlight-container"></div>
                                                      <div class="fc-bgevent-container"></div>
                                                      <div class="fc-business-container"></div>
                                                    </div>
                                                  </td>
                                                  <td>
                                                    <div class="fc-content-col">
                                                      <div class="fc-event-container fc-helper-container"></div>
                                                      <div class="fc-event-container"></div>
                                                      <div class="fc-highlight-container"></div>
                                                      <div class="fc-bgevent-container"></div>
                                                      <div class="fc-business-container"></div>
                                                    </div>
                                                  </td>
                                                  <td>
                                                    <div class="fc-content-col">
                                                      <div class="fc-event-container fc-helper-container"></div>
                                                      <div class="fc-event-container"></div>
                                                      <div class="fc-highlight-container"></div>
                                                      <div class="fc-bgevent-container"></div>
                                                      <div class="fc-business-container"></div>
                                                    </div>
                                                  </td>
                                                  <td>
                                                    <div class="fc-content-col">
                                                      <div class="fc-event-container fc-helper-container"></div>
                                                      <div class="fc-event-container"><a
                                                          class="fc-time-grid-event fc-v-event fc-event fc-start fc-end fc-draggable fc-resizable"
                                                          style="top: 991px; bottom: -1115px; z-index: 1; left: 0%; right: 0%;">
                                                          <div class="fc-content">
                                                            <div class="fc-time" data-start="4:00" data-full="4:00 PM">
                                                              <span>4:00</span></div>
                                                            <div class="fc-title">Repeating Event</div>
                                                          </div>
                                                          <div class="fc-bg"></div>
                                                          <div class="fc-resizer fc-end-resizer"></div>
                                                        </a></div>
                                                      <div class="fc-highlight-container"></div>
                                                      <div class="fc-bgevent-container"></div>
                                                      <div class="fc-business-container"></div>
                                                    </div>
                                                  </td>
                                                  <td>
                                                    <div class="fc-content-col">
                                                      <div class="fc-event-container fc-helper-container"></div>
                                                      <div class="fc-event-container"></div>
                                                      <div class="fc-highlight-container"></div>
                                                      <div class="fc-bgevent-container"></div>
                                                      <div class="fc-business-container"></div>
                                                    </div>
                                                  </td>
                                                  <td>
                                                    <div class="fc-content-col">
                                                      <div class="fc-event-container fc-helper-container"></div>
                                                      <div class="fc-event-container"></div>
                                                      <div class="fc-highlight-container"></div>
                                                      <div class="fc-bgevent-container"></div>
                                                      <div class="fc-business-container"></div>
                                                    </div>
                                                  </td>
                                                </tr>
                                              </tbody>
                                            </table>
                                          </div>
                                        </div>
                                      </div>
                                    </td>
                                  </tr>
                                </tbody>
                              </table>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </section>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- ////////////////////////////////////////////////////////////////////////////-->
  <?php
    //require_once (PLATFORM_PATH."global/inc/component/customizer.php");
    //require_once (PLATFORM_PATH."global/inc/component/buy.php");
    require_once (PLATFORM_PATH."global/inc/component/footer.php");
    require_once (PLATFORM_PATH."global/inc/platform/lib.php");
    
  ?>

</body>

</html>
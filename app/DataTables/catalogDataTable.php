<?php

namespace App\DataTables;

use App\Models\catalog;
use Yajra\DataTables\Services\DataTable;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Column;

class catalogDataTable extends DataTable
{
    /**
     * Build DataTable class.
     *
     * @param mixed $query Results from query() method.
     * @return \Yajra\DataTables\DataTableAbstract
     */
    public function dataTable($query)
    {
        $dataTable = new EloquentDataTable($query);

        return $dataTable->addColumn('action', 'catalogs.datatables_actions');
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\catalog $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(catalog $model)
    {
        return $model->newQuery();
    }

    /**
     * Optional method if you want to use html builder.
     *
     * @return \Yajra\DataTables\Html\Builder
     */
    public function html()
    {
        return $this->builder()
            ->columns($this->getColumns())
            ->minifiedAjax()
            ->addAction(['width' => '120px', 'printable' => false, 'title' => __('crud.action')])
            ->parameters([
                'dom'       => 'Bfrtip',
                'stateSave' => true,
                'order'     => [[0, 'desc']],
                'buttons'   => [
                    [
                       'extend' => 'create',
                       'className' => 'btn btn-default btn-sm no-corner',
                       'text' => '<i class="fa fa-plus"></i> ' .__('auth.app.create').''
                    ],
                    [
                       'extend' => 'export',
                       'className' => 'btn btn-default btn-sm no-corner',
                       'text' => '<i class="fa fa-download"></i> ' .__('auth.app.export').''
                    ],
                    [
                       'extend' => 'print',
                       'className' => 'btn btn-default btn-sm no-corner',
                       'text' => '<i class="fa fa-print"></i> ' .__('auth.app.print').''
                    ],
                    [
                       'extend' => 'reset',
                       'className' => 'btn btn-default btn-sm no-corner',
                       'text' => '<i class="fa fa-undo"></i> ' .__('auth.app.reset').''
                    ],
                    [
                       'extend' => 'reload',
                       'className' => 'btn btn-default btn-sm no-corner',
                       'text' => '<i class="fa fa-refresh"></i> ' .__('auth.app.reload').''
                    ],
                ],
                 'language' => [
                   'url' => url('//cdn.datatables.net/plug-ins/1.10.12/i18n/English.json'),
                 ],
            ]);
    }

    /**
     * Get columns.
     *
     * @return array
     */
    protected function getColumns()
    {
        return [
            'id' => new Column(['title' => __('models/catalogs.fields.id'), 'data' => 'id','searchable' => false]),
            'title' => new Column(['title' => __('models/catalogs.fields.title'), 'data' => 'title','searchable' => false]),
            'description' => new Column(['title' => __('models/catalogs.fields.description'), 'data' => 'description','searchable' => false]),
            'image' => new Column(['title' => __('models/catalogs.fields.image'), 'data' => 'image','searchable' => false]),
            'view_type' => new Column(['title' => __('models/catalogs.fields.view_type'), 'data' => 'view_type','searchable' => false]),
            'seo_title' => new Column(['title' => __('models/catalogs.fields.seo_title'), 'data' => 'seo_title','searchable' => false]),
            'seo_description' => new Column(['title' => __('models/catalogs.fields.seo_description'), 'data' => 'seo_description','searchable' => false]),
            'seo_keyword' => new Column(['title' => __('models/catalogs.fields.seo_keyword'), 'data' => 'seo_keyword','searchable' => false]),
            'seo_image' => new Column(['title' => __('models/catalogs.fields.seo_image'), 'data' => 'seo_image','searchable' => false]),
            'created_at' => new Column(['title' => __('models/catalogs.fields.created_at'), 'data' => 'created_at','searchable' => false]),
            'updated_at' => new Column(['title' => __('models/catalogs.fields.updated_at'), 'data' => 'updated_at','searchable' => false])
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'catalogs_datatable_' . time();
    }
}

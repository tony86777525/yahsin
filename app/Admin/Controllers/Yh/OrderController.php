<?php

namespace App\Admin\Controllers\Yh;

use App\Models\Order;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;
use App\Services\OrderService;
use Encore\Admin\Widgets\Table;
use Illuminate\Support\Str;

class OrderController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'Order';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new Order());

        $grid->model()->orderBy('created_at', 'DESC');

//        $grid->column('id', __('Id'));
        $grid->column('number', __('Number'));
        $grid->column('status', __('Status'))
            ->display(function($status) {
                return Order::STATUS_OPTIONS[$status];
            });
        $grid->column('name', __('Name'));
        $grid->column('email', __('Email'));
        $grid->column('country', __('Country'));
        $grid->column('recipient_address', __('Recipient'))
            ->display(function () {
                return Str::limit($this->address, 20);
            })->expand(function ($model) {
                $style = 'width: 100%;';
                $style .= 'height: 100px;';
                $style .= 'box-sizing: border-box;';
                $style .= 'overflow: auto;';
                $style .= 'letter-spacing: 1px;';
                $style .= 'border: 0px;';
                $style .= 'background: #fff;';
                $style .= 'font-size: 16px;';
                $style .= 'margin-bottom: 10px;';

//                return new Table(
//                    ['Name', 'Email', 'Address'],
//                    [[$model->name, $model->email, $model->address]]
//                );
                return
//                    "<div style='$style'>$model->name</div>"
//                    . "<div style='$style'>$model->email</div>"
                    "<div style='$style'>$model->address</div>";
            });
        $grid->column('google_drive_folder_id', __('Google Drive Folder Id'))
            ->display(function($google_drive_folder_id) {
                if (!empty($google_drive_folder_id)) {
                    return "<a href='https://drive.google.com/drive/folders/$google_drive_folder_id' target='_blank'>查看檔案</a>";
                } else {
                    return "無檔案";
                }
            });
        $grid->column('created_at', __('Created at'));
//        $grid->column('updated_at', __('Updated at'));

        $grid->filter(function($filter){
            $filter->disableIdFilter();

            $filter->like('number', 'Number');
            $filter->equal('status', 'Status')->radio(Order::STATUS_OPTIONS);
        });

        $grid->disableBatchActions();
//        $grid->disableCreateButton();
        $grid->disableExport();
        $grid->disableColumnSelector();
        $grid->disablePagination();

        $grid->actions(function($actions){
            $actions->disableView();
        });

        return $grid;
    }

    /**
     * Make a show builder.
     *
     * @param mixed $id
     * @return Show
     */
    protected function detail($id)
    {
        $show = new Show(Order::findOrFail($id));

//        $show->field('id', __('Id'));
        $show->field('number', __('Number'));
        $show->field('status', __('Status'));
        $show->field('name', __('Name'));
        $show->field('email', __('Email'));
        $show->field('country', __('Country'));
        $show->field('recipient_name', __('Recipient Name'));
        $show->field('recipient_company_name', __('Recipient Company Name'));
        $show->field('recipient_address_nation', __('Recipient Address Nation'));
        $show->field('recipient_address_country', __('Recipient Address Country'));
        $show->field('recipient_address_code', __('Recipient Address Code'));
        $show->field('recipient_address', __('Recipient Address'));
        $show->field('recipient_tel', __('Recipient Tel'));
        $show->field('recipient_email', __('Recipient Email'));
        $show->field('google_drive_folder_id', __('Google Drive Folder Id'));
        $show->field('created_at', __('Created at'));
//        $show->field('updated_at', __('Updated at'));

        return $show;
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        $form = new Form(new Order());

        $form->display('number', __('Number'));
        $form->radio('status', __('Status'))->options(Order::STATUS_OPTIONS);
        $form->text('name', __('Name'));
        $form->email('email', __('Email'));
        $form->text('country', __('Country'));
        $form->text('recipient_name', __('Recipient Name'));
        $form->text('recipient_company_name', __('Recipient Company Name'));
        $form->text('recipient_address_nation', __('Recipient Address Nation'));
        $form->text('recipient_address_country', __('Recipient Address Country'));
        $form->text('recipient_address_code', __('Recipient Address Code'));
        $form->text('recipient_address', __('Recipient Address'));
        $form->text('recipient_tel', __('Recipient Tel'));
        $form->text('recipient_email', __('Recipient Email'));
        $form->text('google_drive_folder_id', __('Google Drive Folder Id'));

        $form->saving(function (Form $form) {
            $form->number = OrderService::getNewNumber();
        });

        $form->disableEditingCheck();
        $form->disableViewCheck();
        $form->disableCreatingCheck();

        $form->tools(function (Form\Tools $tools) {
            $tools->disableList();
            $tools->disableDelete();
            $tools->disableView();
        });

        $form->footer(function ($footer) {
            $footer->disableReset();
        });

        return $form;
    }
}

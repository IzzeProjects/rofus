<?php

namespace App\Http\Services;

class Form
{

    /**
     * Make a input field
     *
     * @param string $name
     * @param string $type
     * @param array $options
     * @param null $default
     * @return string
     * @throws \Throwable
     */
    public function input($name, $type, $options = null, $default = null)
    {
        return view('admin.form.input', compact('name', 'type', 'default', 'options'))->render();
    }

    /**
     * Make a textarea
     *
     * @param string $name
     * @param array $options
     * @param null $default
     * @return string
     * @throws \Throwable
     */
    public function textarea($name, $options = null, $default = null)
    {
        return view('admin.form.textarea', compact('name', 'default', 'options'))->render();
    }

    /**
     * Make a select field
     *
     * @param string $name
     * @param $values
     * @param array $options
     * @param null $default
     * @return string
     * @throws \Throwable
     */
    public function select($name, $values, $options = null, $default = null)
    {
        return view('admin.form.select', compact('name', 'default', 'options', 'values'))->render();
    }

    /**
     * Make a select field
     *
     * @param string $name
     * @param $items
     * @param array $options
     * @param null $default
     * @return string
     * @throws \Throwable
     */
    public function selectSearch($name, $items, $options = null, $default = null)
    {
        return view('admin.form.select.search', compact('name', 'default', 'options', 'items'))->render();
    }

    /**
     * Make a select multi field
     *
     * @param string $name
     * @param $items
     * @param array $options
     * @param null $default
     * @return string
     * @throws \Throwable
     */
    public function selectMulti($name, $items, $options = null, $default = null)
    {
        return view('admin.form.select.multi', compact('name', 'default', 'options', 'items'))->render();
    }

    /**
     * Make a select multi field
     *
     * @param string $name
     * @param null $default
     * @return string
     * @throws \Throwable
     */
    public function file($name, $default = null)
    {
        return view('admin.form.file', compact('name', 'default'))->render();
    }

    /**
     * Iterator for images
     *
     * @param array $default
     * @return string
     * @throws \Throwable
     */
    public function imageIterator($default = [])
    {
        return view('admin.form.images.iterator', compact('default'))->render();
    }

    /**
     * Display errors form
     *
     * @return string
     * @throws \Throwable
     */
    public function errors()
    {
        return view('admin.partials.errors')->render();
    }

    /**
     * Display pages links
     *
     * @param array $items
     * @return string
     * @throws \Throwable
     */
    public function links($items)
    {
        return view('admin.form.actions.search', compact('items'))->render();
    }

    /**
     * Display form of delete action
     *
     * @param string $item
     * @param string $route
     * @return string
     * @throws \Throwable
     */
    public function delete($item, $route)
    {
        return view('admin.form.actions.delete', compact('item', 'route'))->render();
    }

}

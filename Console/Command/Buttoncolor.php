<?php
namespace Hibrido\Buttoncolor\Console\Command;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Magento\Store\Model\StoreManagerInterface;
use Magento\Framework\App\Config\ConfigResource\ConfigInterface;
use Magento\Store\Model\ScopeInterface;

class Buttoncolor extends Command
{

    const COLOR_HEX = "color";
    const STORE_ID = "store";
    /**
     * @var \Magento\Store\Model\StoreManagerInterface
     */
    private $storeManager;
    /**
     * @var \Magento\Framework\App\Config\ConfigResource\ConfigInterface
     */
    private $resourceConfig;
    /**
     * @inheritDoc
     */
    public function __construct(\Magento\Store\Model\StoreManagerInterface $storeManager,ConfigInterface $resourceConfig) 
    {
        $this->storeManager = $storeManager;
        parent::__construct();
        $this->resourceConfig = $resourceConfig;
    }
    /**
     * {@inheritdoc}
     */
    protected function execute(
        InputInterface $input,
        OutputInterface $output
    ) {
        $color = $input->getOption(self::COLOR_HEX);
        $store = $input->getOption(self::STORE_ID);
        $storeObj = $this->storeManager->getStore($store);
        if(!$storeObj->getStoreId()){
            $this->resourceConfig->saveConfig('hibrido_buttoncolor/general_config/color_hex', $color, 'default', 0);
            $storeName = 'default';
        }else{
            $this->resourceConfig->saveConfig('hibrido_buttoncolor/general_config/color_hex', $color, ScopeInterface::SCOPE_STORES, $store);
            $storeName = $storeObj->getName();
        }
        $output->writeln('Gravado com sucesso, Cor: ' .$color.' '. 'Loja id: '. $store. ' Nome da loja :'.$storeName);
    }

    /**
     * {@inheritdoc}
     */
    protected function configure()
    {
        $this->setName("color-change");
        $this->setDescription("Muda a cor dos botões");
        $this->addOption(
            self::COLOR_HEX,
            null,
            InputOption::VALUE_REQUIRED,
            'Color'
        );
        $this->addOption(
            self::STORE_ID,
            null,
            InputOption::VALUE_OPTIONAL,
            'Store id'
        );
        parent::configure();
    }
}
